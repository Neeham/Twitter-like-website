<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
			integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
			crossorigin="anonymous"
		/>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Lato:300,400,700"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="./style.css" />
		<title>Home Page</title>
	</head>
	<body>
		<nav class="navbar navbar-dark navbar-expand-sm bg-purp">
			<div class="container">
				<a href="#" class="navbar-brand"><h3>TW33T0R🤖</h3></a>
				<button
					class="navbar-toggler collapsed float-right"
					data-toggle="collapse"
					data-target="#navbarNav"
					aria-expanded="false"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="  navbar-collapse collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto ">
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fas fa-info"></i> About</a>
						</li>
						<li class="nav-item">
							<button class="btn btn-warning mx-2">Logout</button>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid profile">
			<div class="container d-flex">
				<div class="profile-picture"></div>
				<div class="profile-info text-white ml-3">
					<h2 class="display-4 mb-1 name">Stacy Jenkins</h2>

					<h4 class="username">
						<a href="#"><i class="far fa-user"></i> @StacyJ437</a>
					</h4>
					<h4 class="location">
						<i class="fas fa-map-marker-alt"></i> Montreal, QC
					</h4>
					<p class="lead bio">24 Year-old barista <a href="#">@Starbucks</a></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 d-none d-lg-block messages">
					<div class="card">
						<div class="card-header">Messages</div>
						<div class="card-body">
							<div class="card-text">
								<ul class="list-group p-0">
									<li class="list-group-item ">
										<a href="#">
											<h6>
												<img src="./User-Images/3.jpg" />Ann
												<span class="badge badge-danger float-right">3</span>
											</h6>
										</a>
									</li>
									<li class="list-group-item ">
										<a href="#">
											<h6>
												<img src="./User-Images/2.jpg" />Marc
												<span class="badge badge-danger float-right">1</span>
											</h6>
										</a>
									</li>
									<li class="list-group-item ">
										<a href="#">
											<h6>
												<img src="./User-Images/1.jpg" /> John
												<span class="badge badge-danger float-right">1</span>
											</h6>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 tweets mx-3">
					<div class="card text-center write-a-tweet">
						<div class="card-header">Write A Tweet</div>
						<div class="card-body">
							<div class="card-text">
								<textarea
									class="form-control"
									placeholder="Write your thoughts..."
								></textarea>
								<div class="float-right">
									<button class="btn btn-secondary upload-button">
										<i class="fas fa-upload "></i> Upload
									</button>

									<button class="btn btn-primary my-3">Submit</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card my-3">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<a class="nav-link active" href="#">Your Feed</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Your Tweets</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Your Followers</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#">Following</a>
								</li>
							</ul>
						</div>
						<ul class="list-group tweet-list">
							<li class="list-group-item tweet">
								<div class="media">
									<img src="./User-Images/1.jpg" alt="" />
									<div class="media-body mx-2">
										<h5><a href="#">@JStrong</a></h5>
										Lorem, ipsum dolor sit amet consectetur adipisicing elit.
										Quasi enim minima odio, inventore sint sunt nulla adipisci
										iure sit dolor. <br />
										<button class="btn btn-primary float-right reply mx-3">
											Reply <i class=" fas fa-reply"></i>
										</button>
										<button class="btn float-right btn-danger">
											<i class="fas fa-heart"></i>
										</button>
									</div>
								</div>
							</li>
							<li class="list-group-item tweet">
								<div class="media">
									<img src="./User-Images/2.jpg" alt="" />
									<div class="media-body mx-2">
										<h5><a href="#">@MarcEverstone</a></h5>
										Lorem, ipsum dolor sit amet consectetur adipisicing elit.
										Quasi enim minima odio, inventore sint sunt nulla adipisci
										iure sit dolor. <br />
										<button class="btn btn-primary float-right reply mx-3">
											Reply <i class=" fas fa-reply"></i>
										</button>
										<button class="btn float-right btn-danger">
											<i class="fas fa-heart"></i>
										</button>
									</div>
								</div>
							</li>
							<li class="list-group-item tweet">
								<div class="media">
									<img src="./User-Images/3.jpg" alt="" />
									<div class="media-body mx-2">
										<h5><a href="#">@AnnWelleck</a></h5>
										Lorem, ipsum dolor sit amet consectetur adipisicing elit.
										Quasi enim minima odio, inventore sint sunt nulla adipisci
										iure sit dolor. <br />
										<button class="btn btn-primary float-right reply mx-3">
											Reply <i class=" fas fa-reply"></i>
										</button>
										<button class="btn float-right btn-danger">
											<i class="fas fa-heart"></i>
										</button>
									</div>
								</div>
							</li>
							<li class="list-group-item tweet">
								<div class="media">
									<img src="./User-Images/4.jpg" alt="" />
									<div class="media-body mx-2">
										<h5><a href="#">@Catherine5442</a></h5>
										Lorem, ipsum dolor sit amet consectetur adipisicing elit.
										Quasi enim minima odio, inventore sint sunt nulla adipisci
										iure sit dolor. <br />
										<button class="btn btn-primary float-right reply mx-3">
											Reply <i class=" fas fa-reply"></i>
										</button>
										<button class="btn float-right btn-danger">
											<i class="fas fa-heart"></i>
										</button>
									</div>
								</div>
							</li>
							<li class="list-group-item tweet">
								<div class="media">
									<img src="./User-Images/5.jpg" alt="" />
									<div class="media-body mx-2">
										<h5><a href="#">@JohnG</a></h5>
										Lorem, ipsum dolor sit amet consectetur adipisicing elit.
										Quasi enim minima odio, inventore sint sunt nulla adipisci
										iure sit dolor. <br />
										<button class="btn btn-primary float-right reply mx-3">
											Reply <i class=" fas fa-reply"></i>
										</button>
										<button class="btn float-right btn-danger">
											<i class="fas fa-heart"></i>
										</button>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script
			src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
			crossorigin="anonymous"
		></script>
		<script
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
			integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
			crossorigin="anonymous"
		></script>
		<script>
			$('[data-toggle="popover"').popover();
		</script>
	</body>
</html>
