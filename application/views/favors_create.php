<div id="main-content">
    <div class="segment">
        <div class="greeting">Create a Favor</div>
        <?php if (isset($message)) { ?>
            <div class = "c red" style="display:block"><?php echo $message?></div>
        <?php } ?>

        <form id = "form" method = "post" action = "<?php echo site_url('favors/create') ?>">
            Name<input type = "text" class = "input"  name="name" value="<?php if (isset($name)) { echo $name; } ?>"/><br>
            Type
            <select name="type" value="<?php if (isset($type)) { echo $type; } ?>">
                <option value = "Event">Event</option>
                <option value = "Good">Good</option>
                <option value = "Service">Service</option>
            </select>
            <br><br>
            Quantity<input type = "text" class = "input"  name="quantity" value="<?php if (isset($quantity)) { echo $quantity; } ?>"/><br>
            Worth<input type = "text" class = "input"  name="worth" value="<?php if (isset($worth)) { echo $worth; } ?>"/><br>
            Description<textarea name="description"/><?php if (isset($description)) { echo $description; } ?></textarea><br>
            <input type="submit" value = "Submit" id = "submit"/>
        </form>
    </div>
</div>