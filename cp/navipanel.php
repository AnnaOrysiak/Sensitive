<div id="info">
    <a href="#" alt="informacja">
        <i class="icon-info"></i>
    </a>
</div>
<div id="ustawienia">
            <form action='indexpanel.php' method='post' name="subsite">
                <input type="hidden" name="subsite" value="config">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                <button type="submit" id="ustawienia"><i class="icon-cog"></i></button>
            </form>    
</div>
<div id="logout">
    <a href="cp/logout.php" alt="Wyloguj"><i class="icon-power"></i></a>
</div>