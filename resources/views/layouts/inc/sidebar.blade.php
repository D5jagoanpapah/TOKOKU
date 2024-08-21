<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="{{ url('/') }}" class="simple-text logo-normal">
          TokoKu
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active':''; }}  ">
            <a class="nav-link" href="{{ url('/dashboard') }}">
              <i class="fa fa-line-chart" aria-hidden="true"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active':''; }} ">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="fa fa-th-list" aria-hidden="true"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-category') ? 'active':'';  }}">
            <a class="nav-link" href="{{ url('add-category') }}">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('products') ? 'active':''; }} ">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="fa fa-cubes" aria-hidden="true"></i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-products') ? 'active':'';  }}">
            <a class="nav-link" href="{{ url('add-products') }}">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
              <p>Add Products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('orders') ? 'active':'';  }}"">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">content_paste</i>
              <p>Orders </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('users') ? 'active':'';  }}"">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">person</i>
              <p>Users </p>
            </a>
          </li>
        </ul>
      </div>
    </div>