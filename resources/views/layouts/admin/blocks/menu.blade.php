<div class="dashboard-header">
	<nav class="navbar navbar-expand-lg bg-white fixed-top">
		<a class="navbar-brand" href="https://www.rahweb.ir/" target="_blank" rel="noopener noreferrer">
			RAHWEB.IR
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto navbar-right-top">


				<li class="nav-item dropdown nav-user">
					<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<img src="{{asset('assets/admin/images/avatar.jpg')}}" alt=""
							class="user-avatar-md rounded-circle">
					</a>
					<div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
						aria-labelledby="navbarDropdownMenuLink2">
						<div class="nav-user-info">
							<h5 class="mb-0 text-white nav-user-name">
                               {{Auth::user()->name. ''. Auth::user()->family  }}
							</h5>

						</div>

						<a class="dropdown-item" href="{{url('admin/logout')}}">
							<i class="fas fa-power-off me-2"></i>
							خروج
						</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>
