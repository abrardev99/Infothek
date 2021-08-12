<x-app-layout :title="'Create Post'">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('post.index') }}" class="btn btn-primary text-white" >Back</a>
            </div>
            <div class="card">
                <div class="card-header"><h3>Create Post</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name<small class="text-danger">*</small></label>
                                    <input name="name" id="name" type="text" value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror" autofocus required>
                                    <small>Name will be unique slug</small>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_id">Parent Category</label>
                                    <select name="category_id"
                                            class="select2 form-control @error('category_id') is-invalid @enderror" id="category_id">
                                        <option value="">None</option>
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input name="description" id="description" type="text" value="{{ old('description') }}"
                                           class="form-control @error('description') is-invalid @enderror">
                                    <small>Max length 200 characters</small>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="content" id="content"
                                              class="form-control @error('content') is-invalid @enderror"></textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button name="from" type="submit" value="save" class="btn btn-primary">Save</button>
                        <button name="from" type="submit" value="save_and_create_new" class="btn btn-primary">Save And Create New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>

            /* For other boilerplate styles, see: /docs/general-configuration-guide/boilerplate-content-css/ */
            /*
            * For rendering images inserted using the image plugin.
            * Includes image captions using the HTML5 figure element.
            */

            figure.image {
                display: inline-block;
                border: 1px solid gray;
                margin: 0 2px 0 1px;
                background: #f5f2f0;
            }

            figure.align-left {
                float: left;
            }

            figure.align-right {
                float: right;
            }

            figure.image img {
                margin: 8px 8px 0 8px;
            }

            figure.image figcaption {
                margin: 6px 8px 6px 8px;
                text-align: center;
            }


            /*
             Alignment using classes rather than inline styles
             check out the "formats" option
            */

            img.align-left {
                float: left;
            }

            img.align-right {
                float: right;
            }

            /* Basic styles for Table of Contents plugin (toc) */
            .mce-toc {
                border: 1px solid gray;
            }

            .mce-toc h2 {
                margin: 4px;
            }

            .mce-toc li {
                list-style-type: none;
            }



        </style>

    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

        <script src="https://cdn.tiny.cloud/1/lclnzdlyjcsw0bdeb43tg41kpmhxgl9c78017z7mqez50g0g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>

            var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

            tinymce.init({
                selector: 'textarea#content',
                branding: false,
                document_base_url: '{{ config('app.url') }}',
                automatic_uploads: true,
                images_upload_url: '{{ route('post.tinymce-image.store') }}',
                images_reuse_filename: true,
                file_picker_types: 'image',
                relative_urls : false,
                remove_script_host : true,
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                // imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                toolbar_sticky: true,
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                // image_advtab: true,
                importcss_append: true,

                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 600,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image imagetools table',
                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: useDarkMode ? 'dark' : 'default',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });



        </script>

    @endpush
</x-app-layout>
