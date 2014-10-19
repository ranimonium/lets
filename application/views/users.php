<div id="main-content">
    <div class="segment">
        <div class="greeting">
            ORGANIZATIONS
            <a class="side-link" href="<?php echo site_url('users/create_org') ?>">[Create an Organization]</a>
        </div>

        <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url('users/join_org') ?>">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>About</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($organizations as $org) { ?>
                    <tr>
                        <td><?php echo $org->name ?></td>
                        <td><?php echo $org->about ?></td>

                        <?php if (!in_array($org->userid, $memberships)) { ?>
                            <td><button type="submit" name="orgid" value="<?php echo $org->userid ?>">JOIN</button></td>
                        <?php } else { ?>
                            <td><i>Already a member</i></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>

    <div class="segment">
        <div class="greeting">
            PEOPLE
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>About</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $peep) { ?>
                <tr>
                    <td><?php echo $peep->name ?></td>
                    <td><?php echo $peep->about ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>