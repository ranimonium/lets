<div id="main-content">

    <div class="greeting">
        Hello, <?php echo $this->session->userdata('current_user')->username ?>!!
    </div>

    <div id="points">
        You currently have <?php echo $points ?> points
    </div>
</div>