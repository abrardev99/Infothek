<x-frontend-layout :title="'Home'" :description="'Home Page '.config('app.name')">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page header with logo and tagline-->
    <x-front.header/>
    <!-- Page content-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3">
                @php $categoryName = '' @endphp
                @isset($category)
                    @php $categoryName = $category->name  @endphp
                @endif
                <div class="card mb-4">
                    <div class="card-header">Kategorien</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="sidenav">

                                @forelse($categories as $category)

                                    @if($category->childCategories->count() > 0)

                                        <button class="dropdown-btn">
                                            <i class="fa fa-caret-right"></i>
                                            {{ $category->name }}
                                        </button>
                                        <div class="dropdown-container">
                                            @foreach($category->childCategories as $childCategory)
                                                <a href="{{ route('category-posts', $childCategory) }}">{{ $childCategory->name }}</a>
                                            @endforeach
                                        </div>

                                    @else
                                        <a href="{{ route('category-posts', $category) }}">{{ $category->name }}</a>
                                    @endif
                                @empty

                                @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if($categoryName)
                    <h3 class="mb-3">{{ $categoryName }}</h3>
                @endif
                <div class="row">
                    @forelse($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 400px">
                                <a href="{{ route('single-post', $post) }}"><img class="card-img-top" src="{{ $post->getFirstMediaUrl('thumbnails') != "" ? $post->getFirstMediaUrl('thumbnails') : 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg' }}"
                                alt="{{ $post->title }}"/>
                            </a>
                                <div class="card-body">
                                    <div class="small mb-2 text-muted">{{ $post->created_at->diffForHumans() }}
                                        @if($post->category)
                                            <a href="{{ route('category-posts', $post->category) }}"><span
                                                    class="badge bg-secondary">{{ $post->category->name }}</span></a>
                                        @endif
                                    </div>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <center><h3>No Post Found</h3></center>
                    @endforelse
                <!-- Pagination-->
                    {{ $posts->links('pagination.bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>


<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  top: 0;
  left: 0;
  background-color: rgb(255, 255, 255);
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #039ad6;
  display: block;
  border: unset;
  background: unset;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: unset;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #0497f8;
}

/* Add an active class to the active dropdown button */
.active {
  background-color:unset;
  color: #04bef7;
}
button:focus {
    border: none;
    outline: none;
}
/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  border: unset;
  /* background-color: #6b6b6b; */
  padding-left: 20px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  /* float: right; */
  /* padding-right: 8px; */
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<script>

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;

      var icon = this.getElementsByTagName('i')[0];

      if (dropdownContent.style.display === "block") {
            icon.className = 'fa fa-caret-right'
            dropdownContent.style.display = "none";
      } else {

            dropdownContent.style.display = "block";
            icon.className = 'fa fa-caret-down'
      }
      });
    }
</script>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
</x-frontend-layout>
