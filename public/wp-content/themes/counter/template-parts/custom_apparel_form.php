<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 20/03/19
 * Time: 1:57 PM
 */

?>

<form id="booker" action="" class="awebooking-check-form awebooking-check-form--vertical has-children" onsubmit="return false;" method="POST">
    <div class="awebooking-check-form__wrapper">
        <h2 class="awebooking-heading">Send us a request & price offer</h2>
        <div class="awebooking-check-form__content">
            <div class="awebooking-field awebooking-children-field">
                <label for="">Name*</label>
                <div class="awebooking-field-group">
                    <input type="text" name="name" value="" placeholder="" required>
                </div>
            </div>

            <div class="awebooking-field awebooking-children-field">
                <label for="">Team Name*</label>
                <div class="awebooking-field-group">
                    <input type="text" name="team-name" value="" placeholder="" required>
                </div>
            </div>

            <div class="awebooking-field awebooking-children-field">
                <label for="">City*</label>
                <div class="awebooking-field-group">
                    <input type="text" name="City" value="" placeholder="" required>
                </div>
            </div>

            <div class="awebooking-field awebooking-children-field">
                <label for="">Country*</label>
                <div class="awebooking-field-group">
                    <input type="text" name="Country" value="" placeholder="" required>
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
                <label for="">Quantity of riders*</label>
                <div class="awebooking-field-group">
                    <input type="text" name="quantity" value="" placeholder="" required>
                </div>
            </div>

            <div class="awebooking-field awebooking-adults-field">
                <label for="">Discipline</label>
                <div class="awebooking-field-group">
                    <i class="awebookingf awebookingf-select"></i>
                    <select name="discipline" class="awebooking-select" required>
                        <option value=""></option>
                        <?php
                        $descendant= array('child_of'=>60,
                            'orderby' => 'description',
                            'order'   => 'ASC');
                        $categories = get_categories($descendant);

                        foreach($categories as $cat) :?>
                            <option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>

            <div class="awebooking-field awebooking-adults-field">
                <label for="">Logo’s in EPS format, no JPEG</label>
                <div class="awebooking-field-group">
                    <input type="file" name="eps">
                </div>
            </div>

            <div class="awebooking-field awebooking-adults-field">
                <label for="">Send us you design wish or example</label>
                <div class="awebooking-field-group">
                    <input type="file" name="example">
                </div>
            </div>

            <input type="hidden" name="action" value="booker">
            <input type="hidden" name="type" value="custom">
            <div class="awebooking-field mb-0">
                <div class="awebooking-field-group">
                    <button id="custom_booking" type="submit" class="awebooking-btn">SEND</button>
                </div>
            </div>
        </div>
    </div>
</form>

