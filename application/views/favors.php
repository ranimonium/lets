<div id="main-content">

    <div class="segment">
        <div class="greeting">
            FAVORS
		<?php if(count($favors)>0) {?>
        </div>
        <div id="favor-filters" style="margin-left:2.5%">
            <a href="<?php echo site_url('favors') ?>">All</a>
            <a href="<?php echo site_url('favors/get/event') ?>">Event</a>
            <a href="<?php echo site_url('favors/get/service') ?>">Service</a>
            <a href="<?php echo site_url('favors/get/good') ?>">Good</a>
        </div>
        <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url('favors/avail_favor') ?>">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Type</th>
                        <th>Worth</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($favors as $f) {
						if ($f->qty > 0) {?>
                        <tr>
                            <td><?php echo $f->name ?></td>
                            <td><?php echo $f->owner ?></td>
                            <td><?php echo $f->type ?></td>
                            <td><?php echo $f->worth ?></td>
                            <td><?php echo $f->description ?></td>
                            <td><?php echo $f->qty ?></td>

                            <?php if (!in_array($f->favorid, $avails)) { ?>
                                <td><button name="favorid" type="submit" value="<?php echo $f->favorid ?>">AVAIL</button></td>
                            <?php } else { ?>
                                <td><i>Requested</i></td>
                            <?php } ?>
                        </tr>
                    <?php }
					} ?>
                </tbody>
            </table>
        </form>
		<?php } else {?>
			<br/>There are no favors available at the moment. 
			</div>
		<?php }?>
    </div>
</div>