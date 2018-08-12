<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LED Matrix Animation Creator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        	<div class="container">
        		<a class="navbar-brand" href="#">LED Matrix Animation Creator</a>
        	</div>
        </nav>
    </header>

    <main role="main" class="container">
		<div class="mt-5"></div>
		<!--<?php var_dump($_SESSION["error_msg"]); ?>
		<?php if (isset($_SESSION["error_msg"])) { ?>
			<div class="alert alert-danger" role="alert">
				<strong>Error!</strong> <?php echo $_SESSION["error_msg"]; ?>
			</div>
		<?php unset($_SESSION["error_msg"]); } ?>-->
		<div class="row">
			<div class="col">
				<h1>LED Matrix Animation Creator</h1>
				<p class="lead">Use <a href="https://www.piskelapp.com/">Piskel</a> (or a simmilar program) to design your animation, export it as a PNG spritesheet (one collumn, all frames arranged one below another) and then upload it here.</p>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">Create Animation</div>
					<div class="card-body">
						<form action="convert.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="width">Matrix Width</label>
								<input type="number" min="1" class="form-control" name="width" />
							</div>
							<div class="form-group">
								<label for="height">Matrix Height</label>
								<input type="number" min="1" class="form-control" name="height" />
							</div>
							<div class="form-group">
								<label for="datapin">Datapin on the Arduino</label>
								<input type="number" min="1" class="form-control" name="datapin" />
							</div>
							<div class="form-group">
								<label for="animationfps">Animation Frames Per Second</label>
								<input type="number" class="form-control" name="animationfps" />
							</div>
							<div class="form-group">
								<label for="brightness">Brightness (Percent)</label>
								<div class="input-group">
									<input type="number" min="1" max="100" value="100" class="form-control" name="brightness" />
									<div class="input-group-append">
										<div class="input-group-text">%</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="spritesheetfile">Spritesheet File</label>
								<input type="file" class="form-control-file" name="spritesheetfile" accept=".png" />
							</div>
							<button type="submit" class="btn btn-primary">Convert and Download</button>
						</form>

					</div>
				</div>
			</div>
		</div>
    </main>

    <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>-->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    </head>
  </body>
</html>
