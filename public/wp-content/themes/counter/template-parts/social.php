<?php 

if(get_the_title() == "Le Coffee Ride" ){
        $addrr = "https://www.instagram.com/le_coffee_ride/";
        $class = "social-front";
}else{
        $addrr = "https://www.instagram.com/le_coffee_ride_cafe/";
        $class = "";
}

?>

<div class="social-banner <? echo $class; ?>" style="background-image: url('https://www.lecoffeeride.cc/insta-pic-3/');">
	<div class="site-social-icons-shortcode">
		<ul class="center" style="font-size:40px">
                	<li class="site-social-icons-facebook">
                		<a target="_blank" href="https://www.facebook.com/lecoffeeridebelgium/">
                			<i class="fa fa-facebook"></i>
                			<span>Facebook</span>
                		</a>
                	</li>            
                	<!-- <li class="site-social-icons-twitter">
                		<a target="_blank" href="https://twitter.com/LaMachineCC">
                			<i class="fa fa-twitter"></i>
                			<span>Twitter</span>
                		</a>
                	</li>    -->                                                                                 
                	<li class="site-social-icons-instagram">
                		<a target="_blank" href="<? echo $addrr ?>">
                			<i class="fa fa-instagram"></i>
                			<span>Instagram</span>
                		</a>
                	</li>
                </ul>
	</div>
</div>