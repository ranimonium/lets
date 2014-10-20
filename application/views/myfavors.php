<div id="main-content">
    <a class="side-link" href="<?php echo site_url('favors/create') ?>">Create a Favor</a>
    <div id="favor-filters" style="margin-top:15px">
        <a href="<?php echo site_url('favors/my/') ?>">All</a>
        <a href="<?php echo site_url('favors/my/pending') ?>">Pending</a>
        <a href="<?php echo site_url('favors/my/inprogress') ?>">In Progress</a>
        <a href="<?php echo site_url('favors/my/accepted') ?>">Accepted</a>
        <a href="<?php echo site_url('favors/my/rejected') ?>">Rejected</a>
    </div>
    
    <div class="segment">
        <div class="greeting">
            Favors requested from me
		<?php if (count($requests)>0) {?>	
        </div>

        <form method="post" class="rtn c" action="<?php echo site_url('exchanges/change_exchangeStatus') ?>">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Worth</th>
                        <th>Quantity</th>
                        <th>Requested by</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $f) { ?>
                        <tr>
                            <td><?php echo $f->name ?></td>
                            <td><?php echo $f->type ?></td>
                            <td><?php echo $f->worth ?></td>
                            <td><?php echo $f->qty ?></td>
                            <td><?php echo $f->requestor ?></td>
                            <td><?php echo $f->status ?></td>
                            <?php if ($f->status == 'Pending') { ?>
                                <td><button type="submit" name="eid" value="<?php echo $f->eid; ?>" >APPROVE</button> &nbsp;
                                    <button type="submit" name="eid" value="<?php echo -$f->eid; ?>">REJECT</button>
                                </td>
                            <?php } else { ?>
                                <td>No actions available</td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
		<?php } else {?>
			<br/><span class = "sub-greeting">You don't have any requests.</span>
		</div>
		<?php }?>
    </div>

    <div class="segment">
        <div class="greeting">
            Favors that I availed
		<?php if (count($favors)>0) {?>	
        </div>

        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Worth</th>
                    <th>Quantity</th>
                    <th>Favor Owner</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favors as $f) { ?>
                    <tr>
                        <td><?php echo $f->name ?></td>
                        <td><?php echo $f->type ?></td>
                        <td><?php echo $f->worth ?></td>
                        <td><?php echo $f->qty ?></td>
                        <td><?php echo $f->owner ?></td>
                        <td><?php echo $f->status ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else {?>
			<br/><span class = "sub-greeting">You haven't availed any favors.</span>
		</div>
		<?php }?>
    </div>
</div>