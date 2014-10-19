<div id="main-content">

    <div class="greeting">
        Hello, <?php echo $this->session->userdata('current_user')->username ?>!!
    </div>

    <div id="points" style="margin-bottom:20px">
        You currently have <?php echo $points ?> points
    </div>

    <div class="segment">
        <div class="greeting">
            Organizations I own
        </div>
    </div>
</div>