<div id="main-content">
    <div class="segment">
        <div class="greeting">
            ORGANIZATIONS
            <a class="side-link" href="#">[Create an Organization]</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>About</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organizations as $org) { ?>
                <tr>
                    <td><?php echo $org->name ?></td>
                    <td><?php echo $org->about ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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