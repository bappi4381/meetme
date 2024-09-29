<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100 my-5">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 my-5">
					
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Admin Login</h1>
							<form action="{{ route('verify.otp') }}" method="POST">
                                @csrf
                                <label for="otp">Enter OTP</label>
                                <input type="text" name="otp" required>
                            
                                <button type="submit">Verify OTP</button>
                            </form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								don't have match the code? <a href="{{ route('login') }}" class="text-dark">Back the login from</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('/') }}assets/js/login.js"></script>
</body>
</html>