<?=form_open('user/edit/'.$profile['id'])?>
<div class="row">
	<div class="col-lg-4 offset-md-4 bg-secondary">
		<h2 class="my-4 text-center"><?=$title?></h2>
		<div class="text-primary">
			<?=validation_errors()?>
		</div>
		<div class="form-group">
			<input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?=$profile['first_name']?>">
		</div>
		<div class="form-group">
			<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?=$profile['last_name']?>">
		</div>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?=$profile['username']?>">
		</div>
		<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="E-mail Address" value="<?=$profile['email']?>">
		</div>
		<div class="form-group">
			<input type="date" name="institution" class="form-control" placeholder="institution" value="<?=$profile['institution']?>">
		</div>
		<div class="form-group">
            <input type="text" name="country" class="form-control" placeholder="Country"  value="<?=$profile['country']?>">
		</div>
		<div class="form-group">
            <input type="text" name="url" class="form-control" placeholder="Website" value="<?=$profile['url']?>">
		</div>
		<div class="form-group">
			<textarea name="description" class="form-control" placeholder="About me"><?=$profile['description']?> </textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
		<br>
		</div>
	</div>
</form>