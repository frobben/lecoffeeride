<form id="booker" action="" class="awebooking-check-form awebooking-check-form--vertical has-children" onsubmit="return false;" method="POST">
	<div class="awebooking-check-form__wrapper">
		<h2 class="awebooking-heading">Reserve your test bike</h2>
		<div class="awebooking-check-form__content">
			<div class="awebooking-field awebooking-arrival-field">
				<label for="">Arrival Date</label>
				<div class="awebooking-field-group">
					<!-- <i class="awebookingf awebookingf-calendar"></i> -->
					<input type="date" class="awebooking-datepicker awebooking-input awebooking-start-date hasDatepicker" name="start-date" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-departure-field">
				<label for="">Departure Date</label>
				<div class="awebooking-field-group">
					<!-- <i class="awebookingf awebookingf-calendar"></i> -->
					<input type="date" class="awebooking-datepicker awebooking-input awebooking-end-date hasDatepicker" name="end-date" required>
					
				</div>
			</div>
			<div class="awebooking-field awebooking-departure-field">
				<label for="">Arrival time</label>
				<div class="awebooking-field-group">
					<!-- <i class="awebookingf awebookingf-calendar"></i> -->
					<input id="time" type="text"  class="awebooking-input" name="time" required>
					
				</div>
			</div>


			<div class="awebooking-sidebar-group">
				<!-- <div class="awebooking-field awebooking-adults-field">
					<label for="">Number of people</label>
					<div class="awebooking-field-group">
						<i class="awebookingf awebookingf-select"></i>
						<select name="adults" class="awebooking-select" required>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
				</div> -->
				
				<div class="awebooking-field awebooking-children-field">
					<label for="">Type of bike</label>
					<div class="awebooking-field-group">
						<i class="awebookingf awebookingf-select"></i>
						<select name="type_bike" class="awebooking-select" required>
							<option value="Peloton">Pro Peloton Bike</option>
							<option value="Enduro">Enduro Bike</option>
						</select>
					</div>
				</div>
			</div>

			<div class="awebooking-field awebooking-adults-field">
				<label for="">Model</label>
				<div class="awebooking-field-group">
					<i class="awebookingf awebookingf-select"></i>
					<select name="model" class="awebooking-select" required>
					<?php $args = array(
					    'post_type'=> 'bike',
					    'order'    => 'ASC'
					    );              
					 ?>
					 <?php $the_query = new WP_Query( $args ); if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<option value="<?php the_title();?>-<?php the_field('size');?>"><?php the_title();?> - Size : <?php the_field('size');?></option>
					<?php endwhile;endif; wp_reset_postdata();?>
					</select>
				</div>
			</div>

			


			<div class="awebooking-field awebooking-children-field">
				<label for="">Name</label>
				<div class="awebooking-field-group">
					<input type="text" name="name" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Email</label>
				<div class="awebooking-field-group">
					<input type="text" name="email" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Phone number</label>
				<div class="awebooking-field-group">
					<input type="text" name="phone" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Home country</label>
				<div class="awebooking-field-group">
					<input type="text" name="address" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Comments</label>
				<div class="awebooking-field-group">
					<textarea name="remark"  placeholder="Please tell us how many bike you want to rent" ></textarea>
				</div>
			</div>

			<input type="hidden" name="action" value="booker">
			<input type="hidden" name="type" value="bike">
			<div class="awebooking-field mb-0">
				<div class="awebooking-field-group">
					<button id="bike_booking" type="submit" class="awebooking-btn">SEND</button>
				</div>
			</div>
		</div>
	</div>
</form>