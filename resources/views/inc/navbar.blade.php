<header class="cd-main-header">

<a class="cd-logo logo-icon" href="/">
	<!-- <img class="img-responsive" style="width:100px"; src="/storage/cover_images/logo.png"> -->
	eKings
	<i  class="fas fa-futbol"></i>
	<!-- <i class="fas fa-basketball-ball"></i> -->
	<!-- <i class="fab fa-playstation"></i> -->
	<!-- <i class="fas fa-gamepad"></i> -->
</a>



<!-- img/logo.png -->

<nav class="cd-nav">
	<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
<!--
		<li class="has-children">
			<a href="#">Turnyrai</a>

			<ul class="cd-nav-gallery is-hidden">




				<li class="go-back"><a href="#">Menu</a></li>
				<li class="see-all"><a href="#">Browse Gallery</a></li>
				<li>
					<a class="cd-nav-item" href="#">
						<img src="img/cs-background.png" alt="Product Image">
						<li>fasfsa</li>
					</a>
				</li>
			</ul>


		</li> -->
		@if (Auth::guest())
		@else
		<li class="has-children">

			<a href="#" style="position:relative; padding-left:65px"><img class="avatar-hidden-max" src="/storage/avatar/{{Auth::user()->avatar}}" style="width:45px; height:45px; position:absolute; bottom:20px;  left:10px; border-radius:50%"><b>{{ Auth::user()->name }}</b></a>

			<ul class="cd-secondary-nav is-hidden">
				<li class="go-back"><a href="#">Menu</a></li>
				<li class="see-all"><a href="#">Vartotojo paskyra</a></li>
				<!-- <li class="has-children">
					<a href="">Accessories</a>

					<ul class="is-hidden">
						<li class="go-back"><a href="#">Clothing</a></li>
						<li class="see-all"><a href="">All Accessories</a></li>
						<li class="has-children">
							<a href="#0">Beanies</a>

							<ul class="is-hidden">
								<li class="go-back"><a href="#">Accessories</a></li>
								<li class="see-all"><a href="#">All Benies</a></li>
								<li><a href="">Caps &amp; Hats</a></li>
								<li><a href="#">Gifts</a></li>
								<li><a href="#">Scarves &amp; Snoods</a></li>
							</ul>
						</li>
						<li class="has-children">
							<a href="#0">Caps &amp; Hats</a>

							<ul class="is-hidden">
								<li class="go-back"><a href="#">Accessories</a></li>
								<li class="see-all"><a href="#">All Caps &amp; Hats</a></li>
								<li><a href="#">Beanies</a></li>
								<li><a href="#">Caps</a></li>
								<li><a href="#">Hats</a></li>
							</ul>
						</li>
						<li><a href="#">Glasses</a></li>
						<li><a href="#">Gloves</a></li>
						<li><a href="#">Jewellery</a></li>
						<li><a href="#">Scarves</a></li>
						<li><a href="#">Wallets</a></li>
						<li><a href="">Watches</a></li>
					</ul>
				</li> -->

				<!-- <li class="has-children">
					<a href="#">Bottoms</a>

					<ul class="is-hidden">
						<li class="go-back"><a href="#">Clothing</a></li>
						<li class="see-all"><a href="#">All Bottoms</a></li>
						<li><a href="#">Casual Trousers</a></li>
						<li class="has-children">
							<a href="#0">Jeans</a>

							<ul class="is-hidden">
								<li class="go-back"><a href="#">Bottoms</a></li>
								<li class="see-all"><a href="#">All Jeans</a></li>
								<li><a href="#">Ripped</a></li>
								<li><a href="#">Skinny</a></li>
								<li><a href="#">Slim</a></li>
								<li><a href="#">Straight</a></li>
							</ul>
						</li>
						<li><a href="#0">Leggings</a></li>
						<li><a href="#0">Shorts</a></li>
					</ul>
				</li> -->



				<li class="has-children">
					<a href="#"><i class="far fa-user"></i> {{ Auth::user()->name }} </a>

					<ul class="is-hidden">
						<li class="go-back"><a href="#">Atgal</a></li>
						<!-- <li class="see-all"><a href="#">Vartotojo paskyra</a></li> -->
						<li><a href="/profile"> Vartotojo Laukas</a></li>
						<li><a href="{{ route('logout') }}"
							 onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();"> Atsijungti</a></li>
														 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																 @csrf
														 </form>

					</ul>
				</li>
				@if(Auth::user()->isAdmin() || Auth::user()->isModerator())
				<li class="has-children">
					<a href="#"><i class="fas fa-newspaper"></i> Social</a>

					<ul class="is-hidden">
						<li class="go-back"><a href="#"> Atgal</a></li>
						<!-- <li class="see-all"><a href="#">Vartotojo paskyra</a></li> -->

						<li><a href="{{ route('posts.index') }}"> Naujienos </a></li>
						<li><a href="{{ route('comments.index') }}"> Komentarai </a></li>
						<li><a href="{{ route('users.index') }}"> Nariai </a></li>



					</ul>
				</li>
				@endif


<!--

				<li class="has-children">
					<a href="#"><i class="fas fa-gamepad"></i> Turnyrai</a>


				</li>


				<li class="has-children">
					<a href="#"><i class="fas fa-unlock"></i> TVS</a>


				</li> -->




				<!-- <li class="has-children">
					<a href="#"><i class="fas fa-lock-open"></i> Admin</a>

					<ul class="is-hidden">
						<li class="go-back"><a href="#">Clothing</a></li>
						<li class="see-all"><a href="#">All Tops</a></li>
						<li><a href="#">Sukurti Naujienas</a></li>
						<li><a href="#">Visi Vartotojai</a></li>
						<li><a href="#">Hoodies &amp; Sweatshirts</a></li>
						<li><a href="#">Jumpers</a></li>
						<li><a href="#">Polo Shirts</a></li>
						<li><a href="#">Shirts</a></li>
						<li class="has-children">
							<a href="#0">T-Shirts</a>

							<ul class="is-hidden">
								<li class="go-back"><a href="#">Tops</a></li>
								<li class="see-all"><a href="#">All T-shirts</a></li>
								<li><a href="#">Plain</a></li>
								<li><a href="#">Print</a></li>
								<li><a href="#">Striped</a></li>
								<li><a href="#">Long sleeved</a></li>
							</ul>
						</li>
						<li><a href="#">Vests</a></li>
					</ul>
				</li> -->
			</ul>
		</li>

		@endif







				<!-- <li><a href="#"><b>UFC3</b></a></li> -->

				<li><a href="{{ route('teams.index') }}"><b>FIFA18</b></a></li>
				<!-- <li><a href="#"><b>NBA2K18</b></a></li> -->
      	<!-- <li><a href="#" class="verchata4"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li> -->


				<!-- <li><a href="#">League Of Legends</a></li> -->
				<!-- <li><a href="#">CS:GO</a></li>
				<li><a href="#">DOTA2</a></li> -->




<!--
		<li class="has-children">
			<a href="#">Turnyrai</a>
			<ul class="cd-nav-icons is-hidden">
				<li class="go-back"><a href="#">Menu</a></li>
				<li class="see-all"><a href="#">Browse Services</a></li>
				<li>
					<a class="cd-nav-item item-1" href="#">
						<h4>Service #1</h4>

					</a>
				</li>

				<li>
					<a class="cd-nav-item item-2" href="#">
						<h3>Service #2</h3>

					</a>
				</li>

				<li>
					<a class="cd-nav-item item-3" href="#">
						<h3>Service #3</h3>
						<p>This is the item description</p>
					</a>
				</li>

				<li>
					<a class="cd-nav-item item-4" href="#">
						<h3>Service #4</h3>
						<p>This is the item description</p>
					</a>
				</li>

				<li>
					<a class="cd-nav-item item-5" href="#">
						<h3>Service #5</h3>
						<p>This is the item description</p>
					</a>
				</li>

				<li>
					<a class="cd-nav-item item-6" href="#">
						<h3>Service #6</h3>
						<p>This is the item description</p>
					</a>
				</li>

				<li>
					<a class="cd-nav-item item-7" href="#">
						<h3>Service #7</h3>
						<p>This is the item description</p>
					</a>
				</li>

				<li>
					<a class="cd-nav-item item-8" href="#">
						<h3>Service #8</h3>
						<p>This is the item description</p>
					</a>
				</li>
			</ul>
		</li>
 -->




	</ul> <!-- primary-nav -->
</nav> <!-- cd-nav -->

		<ul class="cd-header-buttons">

			<!-- <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li> -->
			<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
		</ul> <!-- cd-header-buttons -->
	</header>

	<main class="cd-main-content">
