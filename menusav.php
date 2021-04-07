<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
        <span class="navbar-toggler-icon"></span>
    </button>
                
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($menupont=="tartalom"?"active":""); ?>">
                <a class="nav-link" href="tartalom.php?menusav=tartalom">Könyvek<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($menupont=="rendeles"?"active":""); ?>">
                <a class="nav-link" href="rendeles.php?menusav=rendeles">Rendelés</a>
            </li>
            <li class="nav-item nav-right <?php echo ($menupont=="logout"?"active":""); ?>">
                <a class="nav-link" href="index.php?menusav=logout">Kilépés</a>
            </li>
        </ul>
    </div>
</nav>


