<?php
    if(!isset($_SESSION))
        session_start(); 
    $is_admin = $_SESSION['is_admin'] ?? false; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Menu</title>
  <style>
     body{
        background-color: hotpink;
      }
      * {
        box-sizing: border-box;
        font-family: "Source Sans Pro", "Poppins", sans-serif;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1.5em;
      }

      .menu {
        font-family: sans-serif;
        font-size: 14px;
      }

      .menu-group-heading {
        margin: 0;
        padding-bottom: 1em;
        border-bottom: 2px solid #ccc;
      }

      .menu-group {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5em;
        padding: 1.5em 0;
      }

      .menu-item {
        display: flex;
      }

      .menu-item-img {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        object-fit: cover;
        margin-right: 1.5em;
      }

      .menu-item-text {
        flex-grow: 1;
      }

      .menu-item-heading {
        display: flex;
        justify-content: space-between;
        margin: 0;
      }

      .menu-item-name {
        margin-right: 1.5em;
      }

      .menu-item-desc {
        line-height: 1.6;
      }

      @media screen and (min-width: 992px) {
        .menu {
          font-size: 16px;
        }

        .menu-group {
          grid-template-columns: repeat(2, 1fr);
        }

        .menu-item-img {
          width: 125px;
          height: 125px;
        }
      }
  </style>
</head>
<body>
        <form id="logoutForm" action="/logout" method="post" style="text-align:right;">
            <input type="hidden" name="logout" value="true">
            <button type="submit">Logout</button>
        </form>
    <?php
    if($is_admin === true){
        echo
          '<div class="menu">
              <h2 class="menu-group-heading">Admin Panel(Add/Remove Items from menu)</h2>
              <div class="menu-group">' ; 
                      foreach ($foods as $_ => $food){
                          echo '<div class="menu-item">
                    <img
                      src="'.$food['picture'].'"
                      class="menu-item-img"
                    />
                    <div class="menu-item-text">
                      <h3 class="menu-item-heading">
                        <span class="menu-item-name">'.$food['name'].'</span>
                        <button onclick="addItem('."'".$food['name']."'".')">'.($food['is_in_menu'] ? 'Remove' : 'Add').'</button>
                        <span class="menu-item-price">'.$food['price'].'T</span>
                      </h3>
                    </div>
                  </div>';
                      }
                echo '
              </div>
            </div>' ;
    }
    ?>


    <div class="menu">
      <h2 class="menu-group-heading">SnappFood! Menu</h2>
      <div class="menu-group">
        <?php
            foreach ($foods as $_ => $food){
                if($food["is_in_menu"])
                echo '<div class="menu-item">
          <img
            src="'.$food['picture'].'"
            class="menu-item-img"
          />
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">'.$food['name'].'</span>
              <span class="menu-item-price">'.$food['price'].'T</span>
            </h3>
          </div>
        </div>';
            }
        ?>
      </div>
    </div>


  <script>
    function addItem(itemName) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Item added successfully');
                }
            }
        };

        // Encode the item name in a URL-encoded format
        const encodedItemName = encodeURIComponent(itemName);
        xhr.send('name=' + encodedItemName);
        location.reload(); 
    }
  </script>
</body>
</html>