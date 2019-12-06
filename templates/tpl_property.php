<?php

    function draw_reservation($checkin, $checkout, $numberguests, $property_id) {?>
        <section id="reservation_form">
            <form action="../actions/action_add_reservation.php" method="post">
                <input type = "hidden" name = "property_id" value="<?=$property_id?>">
                <label>Check-in<input name="checkin" type="date" value="<?php echo date($checkin);?>"></label>
                <label>Check-out<input name="checkout" type="date" value="<?php echo date($checkout);?>"></label>
                <label>Guests<input name="guests" type="number" value="<?= $numberguests?>" min="1" max="20"></label>
                <input type="submit" value="Confirm">
            </form>
        </section>  
    <?php
    }
?>


<?php
    function draw_property_list_item($property, $owner, $checkin, $checkout, $guests){ ?>

    <li>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <!-- TODO: remove the id field, it is only temporary for testing purposes -->
        <h3>Property ID: <?= $property['id']?></h3> 
        <h4 class="pl_title"><a href="./property.php?id=<?=$property['id']?>&checkin=<?=$checkin?>&checkout=<?=$checkout?>&guests=<?=$guests?>">Title: <?=$property['title']?></a></h4>
        <h5 class="pl_price">Price: <?=$property['price']?></h5>
        <h5 class="pl_owner"><a href="../pages/profile.php?username=<?=$owner?>">Owner: <?=$owner?></a></h5>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
    </li>
    
<?php
    }
?>

<?php
    function draw_property_info($property){ ?>

    <section class = info_property>
        <h3 class= "id_property">Property ID: <?= $property['id']?> </h3> 
        <h4 class="tile_property">Title: <?= $property['title']?> </h4>
        <h5 class="price_property">Price per night: <?= $property['price']?> </h5>
        <h5 class="city_property">City:<?= $property['city']?> </h5>
        <h5 class="address_property">Address: <?= $property['address']?> </h5>
        <h5 class="description_property">Description: <?= $property['description']?> </h5>
        <h5 class="capacity_property">Max capacity: <?= $property['capacity']?> </h5>
        <h5 class="owner_property"> Owner: <?= get_username($property['owner_id'])?> </h5>
    </section>
    
<?php
    }
?>


<?php
    function draw_no_found(){ ?>

        <section id="no_results">
            <p> No property found for your search...</p>
        </section>
<?php
    }
?>