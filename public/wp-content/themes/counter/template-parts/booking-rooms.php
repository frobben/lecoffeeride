<form id="booker" action="" class="awebooking-check-form awebooking-check-form--vertical has-children" onsubmit="return false;" method="POST">
	<div class="awebooking-check-form__wrapper">
		<h2 class="awebooking-heading">Prepare your stay</h2>
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

				<div class="awebooking-field awebooking-adults-field">
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
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
						</select>
					</div>
				</div>
				
				<div class="awebooking-field">
					<label for="">Accommodation</label>
					<div class="awebooking-field-group">
						<i class="awebookingf awebookingf-select"></i>
						<select name="accomodation_type" class="awebooking-select" required>
							<option value="room">Room + breakfast</option>
							<option value="fridayDinner">Room + Breakfast + Friday Night Pasta Diner</option>
							<option value="SaturdayDinner">Room + Breakfast + Saturday Night BBQ diner</option>
							<option value="FridayAndSaturday">Room + Breakfast + Fridays Night Pasta + Saturday Night BBQ</option>
						</select>
					</div>
				</div>




			<div class="awebooking-field awebooking-children-field">
				<label for="">Name*</label>
				<div class="awebooking-field-group">
					<input type="text" name="name" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Email*</label>
				<div class="awebooking-field-group">
					<input type="text" name="email" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Phone number*</label>
				<div class="awebooking-field-group">
					<input type="text" name="phone" value="" placeholder="" required>
				</div>
			</div>

			<div class="awebooking-field awebooking-children-field">
				<label for="">Comments</label>
				<div class="awebooking-field-group">
					<textarea name="remark" placeholder="Please add any comments"></textarea>
				</div>
			</div>

			<input type="hidden" name="action" value="booker">
			<input type="hidden" name="type" value="accomodation">
			<div class="awebooking-field mb-0">
				<div class="awebooking-field-group">
					<button id="room_booking" type="submit" class="awebooking-btn">SEND</button>
				</div>
			</div>
		</div>
	</div>
</form>