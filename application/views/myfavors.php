<div id="main-content">
    
    <div class="segment">
        <div class="greeting">
            Favors requested from me
            <a class="side-link" href="<?php echo site_url('favors/create') ?>">[Create a Favor]</a>
        </div>
        <div id="favor-filters" style="margin-left:2.5%">
            <a href="<?php echo site_url('favors/my/') ?>">All</a>
            <a href="<?php echo site_url('favors/my/pending') ?>">Pending</a>
            <a href="<?php echo site_url('favors/my/inprogress') ?>">In Progress</a>
            <a href="<?php echo site_url('favors/my/accepted') ?>">Accepted</a>
            <a href="<?php echo site_url('favors/my/rejected') ?>">Rejected</a>
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
    </div>

    <div class="segment">
        <div class="greeting">
            Favors that I availed
        </div>
        <div id="favor-filters" style="margin-left:2.5%">
			<a href="<?php echo site_url('favors/my/') ?>">All</a>
            <a href="<?php echo site_url('favors/my/pending') ?>">Pending</a>
            <a href="<?php echo site_url('favors/my/inprogress') ?>">In Progress</a>
            <a href="<?php echo site_url('favors/my/accepted') ?>">Accepted</a>
            <a href="<?php echo site_url('favors/my/rejected') ?>">Rejected</a>
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
        
    </div>
</div>