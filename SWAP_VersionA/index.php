<?php

// We need to use sessions, so you should always start sessions using the below code
session_start();

// If the user is not logged in redirect to log-in.html...
if (!isset($_SESSION['loggedin'])) {
	header('Location: log-in.html');
	exit();
}

?>

<!--HTML STARTS HERE-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>SWAP</title>
<meta name="author" content="Anna Tsuda">
<meta name="description" content="Facilitating you with your plant-base diet journey">
<meta name="keyword" content="design, vegan">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="prepared/favicon.png"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class="home">
    
    <!-- Launch Screen Modal -->
<!--
    <div id="modal">
        <video id="launchVideo" type="video/mp4" src="prepared/launchScreen2.mp4" autoplay muted loop></video>
    </div> 
-->
    
    <!-- About Modal -->
    <div id="aboutModal">
        
        <div id="shade" onclick="hideAboutModal()"></div>
        
        <div id="paper">
        
            <img id="looseleaf" src="prepared/looseleafPortrait.png">

            <form id="login-signup">

                <img class="aboutCross" src="prepared/cross.png" onclick="hideAboutModal()">
                
                <img class="header" src="prepared/title.png">
                
                <h2 class="black center" style="margin-bottom:0;">What is SWAP?</h2>
                <p class="center">SWAP is a recipe book introducing you to amazing plant-based dishes! This platform specifically and only shares recipes that are traditionally cooked and baked with animal products to demistify the common notion that "plant-based dishes are not as tasty"!<br><br>SWAP is currently at its prototype stage and is limited to viewing recipes. However, I aim to implement additional features in the near future and to grow this into a community space to support one another with our plant-based diet journies. Regardless of your dietary preferences, give SWAP a go!</p>
                
                <h2 class="black center" style="margin-bottom: 0;">What is SWAP's vision?</h2>
                <p class="center">While there are hundreds of positive reasons in becoming plant-based, SWAPS objective is not just to encourage you to become plant-based. My vision is to rewrite the problematic narrative around animal and plant-based products by first exploring the idealisation of meat within our food culture.</p>

                <h2 class="black center" style="margin-bottom: 0;">How did SWAP start?</h2>
                <p class="center">The initial inspiration is deep-rooted in my personal journey of transitioning to a plant-based diet, after moving in with my sister who has been commited to living plant-based for nearly three years. Despite all the information on the farming industry I learnt from her, I'm still finding it difficult to fully give up on certain products like ice cream. Yes, I am a big icecream fan and yes, I am still going through the gradual process just like many of you!<br><br>Most importantly, seeing myself struggle to immediately give up animal products raised many questions including: What makes meat so appealing? How is meat represented and how does it differ from that of vegetables?<br><br>In this way, SWAP is also a research tool to investigate and better understand our relationship with food, through exploring our meat-eating culture specifically from a linguistic lens. Additionally through this investigation, I hope to develop an alternative approach to promoting and normalising plant-based living.</p>
                
                <h2 class="black center" style="margin-bottom: 0;">Get in touch!</h2>
                <p class="center" style="padding-bottom: 3em;">Please contact <a href="mailto:anna.tsuda@outlook.com">anna.tsuda@outlook.com</a> for any enquiries :)</p>

            </form>

        </div> <!--paper-->
        
    </div> <!--aboutModal-->
          
    <header class="homeHeader">

        <img class="header" src="prepared/title.png">

        <div class="search-result">
            <div class="search">
                <img class="searchBar" src="prepared/searchBar.png">
                <input id="textfield" type="text" name="search" placeholder="I want to cook..." onkeyup="showResult(this.value)">
                <a href="index.php">
                    <button class="xButton"></button>
                </a>
            </div> <!--search-->
            <div id="livesearch"></div>
        </div>
        
        <div class="or-categories">

            <h2 style="color:var(--black);">OR</h2>

            <!--categories-->

            <div class="category">
                <button class="iconButton" style="background-image: url(prepared/iconMeat.png);" href="#noMeat" onclick="javascript:toggleSection('noMeat')">
                </button>
                <h2 class="categoryText" style="color: black;">No Meat Recipes</h2>
            </div> <!--category-->

            <div class="category">
                <button class="iconButton" style="background-image: url(prepared/iconFish.png);width:4em;" href="#noFish" onclick="javascript:toggleSection('noFish')">
                </button>
                <h2 class="categoryText" style="color: black;">No Fish Recipes</h2>
            </div><!--category-->

            <div class="category">
                <button class="iconButton" style="background-image: url(prepared/iconEggDairy.png);" href="#noEggDairy" onclick="javascript:toggleSection('noEggDairy')">
                </button>
                <h2 class="categoryText" style="color: black;margin-left:1.2em;">No Egg/Dairy Recipes</h2>
            </div><!--category-->
            
        </div> <!--or-categories-->

    </header>
    
    <div class="dots">
        
        <nav class="stickerDot dot-label">
            <span class="dot openDot" style="background-image: url(prepared/iconHat.png);"></span>
            <h2 class="label" style="color: black;">My Recipe Collection</h2>
        </nav>
        
        <div class="dot-label">
            <span class="dot" style="background-image: url(prepared/iconAbout.png);" onclick="showAboutModal()"></span>
            <h2 class="label" style="color: black;">About</h2>
        </div>
        
        <a href="log-out.php">
        <div class="dot-label">
            <span class="dot" style="background-image: url(prepared/iconDoor.png);"></span>
            <h2 class="label" style="color: black;">Log out</h2>
        </div>
        </a>
        
    </div> <!--dots-->
    
    <nav class="stickerNav">
    
        <h2 class="open">MY RECIPE COLLECTION</h2>
        
        <p class="instruction">Here you can save recipes you cooked and liked :) But this is not ready yet, so please sit tight!</p>
        <img class="cross" src="prepared/cross.png">
        <div class="stickerCanvas">
        </div> <!--projects-->
        
    </nav> <!--stickerNav-->     
    
    <!--EVERYTHING BELOW HERE USES HIDE AND TOGGLE!!!-->
    
    <!--THREE TYPES OF RECIPES-->
    
    <div id="noMeat" class="magic">
        
        <h1>No Meat Recipes</h1>
        
        <div class="allCards">
            
            <a href="dakgalbi.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/dakgalbi.jpg">
                <h2 class="center black dishName">PSEUDO DAKGALBI</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="bolognese.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/bolognese.jpg">
                <h2 class="center black dishName">MEAT FREE BOLOGNESE</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="gyoza-dumplings.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/gyoza.jpg">
                <h2 class="center black dishName">VEGAN GYOZAS</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="gapao-rice.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/gapao.jpg">
                <h2 class="center black dishName">NO MEAT GAPAO RICE</h2>
            </div> <!--recipeCard-->
            </a>
            
        </div> <!--allCards-->
        
    </div> <!--noMeat-->
    
    <div id="noFish" class="magic">
        <h1>No Fish Recipes</h1>
        
        <div class="allCards">
            
            <a href="fish-and-chips.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/fish.jpg">
                <h2 class="center black dishName">BANANA BLOSSOM FISH</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="tuna-sashimi.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/tuna.jpg">
                <h2 class="center black dishName">FAUX TUNA</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="calamari-rings.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/calamari.jpg">
                <h2 class="center black dishName">NO SQUID CALAMARI</h2>
            </div> <!--recipeCard-->
            </a>
            
        </div> <!--allCards-->
        
    </div> <!--noFish-->
    
    <div id="noEggDairy" class="magic">
        <h1>No Egg/Dairy Recipes</h1>
        
        <div class="allCards">
            
            <a href="arancini.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/arancini.jpg">
                <h2 class="center black dishName">DAIRY FREE ARANCINI</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="fruit-tart.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/tart.jpg">
                <h2 class="center black dishName">VEGAN FRUIT TART</h2>
            </div> <!--recipeCard-->
            </a>
            
            <a href="orange-cake.html">
            <div class="recipeCard">
                <img class="dishImage" src="prepared/orange.jpg">
                <h2 class="center black dishName">VEGAN ORANGE CAKE</h2>
            </div> <!--recipeCard-->
            </a>
            
        </div> <!--allCards-->
        
    </div> <!--noEggDairy-->
    
</body>

<script src="script.js"></script>   
    
<script>
    var sa = new Array('noMeat', 'noFish', 'noEggDairy');
</script>
    
</html>