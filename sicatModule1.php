<?php
// Erine Karl Gabriel Sicat
// Dynamic Web Applications and Development Tools
// WD-201
$cardskins = [
    [
        "champion" => "Pyke",
        "skinName" => "PROJECT: Pyke",
        "tier" => "Epic",
        "essence" => "1350",
        "image" => "https://wiki.leagueoflegends.com/en-us/images/Pyke_PROJECTSkin.jpg?18b4e",
        "description" => "An augmented assassin from the depths, enhanced with cutting-edge PROJECT technology. Pyke emerges from the digital shadows to claim his prey with lethal precision."
    ],
    [
        "champion" => "Sett",
        "skinName" => "Mecha Kingdoms Sett",
        "tier" => "Epic",
        "essence" => "1350",
        "image" => "https://ddragon.leagueoflegends.com/cdn/img/champion/splash/Sett_1.jpg",
        "description" => "The Boss of the Mecha Kingdoms, piloting a massive war machine. Sett commands respect and fear with overwhelming mechanical power and an iron fist."
    ],
    [
        "champion" => "Mordekaiser",
        "skinName" => "Infernal Mordekaiser",
        "tier" => "Legendary",
        "essence" => "1820",
        "image" => "https://wiki.leagueoflegends.com/en-us/images/Mordekaiser_InfernalSkin.jpg?7fefb",
        "description" => "Forged in the fires of the underworld, this iron tyrant commands legions of flame. The Infernal Lord rises to consume all who dare oppose his eternal reign."
    ],
    [
        "champion" => "Fiddlesticks",
        "skinName" => "Bandito Fiddlesticks",
        "tier" => "Epic",
        "essence" => "975",
        "image" => "https://wiki.leagueoflegends.com/en-us/images/Fiddlesticks_BanditoSkin.jpg?b60fd",
        "description" => "A haunted scarecrow outlaw from the dusty frontier. This terror of the old west strikes fear into the hearts of travelers with its eerie presence."
    ],
    [
        "champion" => "Warwick",
        "skinName" => "Hyena Warwick",
        "tier" => "Epic",
        "essence" => "975",
        "image" => "https://wiki.leagueoflegends.com/en-us/images/Warwick_HyenaSkin.jpg?931a1",
        "description" => "A savage predator that stalks the wasteland with maniacal laughter. This beast hunts with primal fury, leaving nothing but chaos in its wake."
    ],
    [
        "champion" => "Ahri",
        "skinName" => "Spirit Blossom Ahri",
        "tier" => "Mythic",
        "essence" => "3250",
        "image" => "https://wiki.leagueoflegends.com/en-us/images/Ahri_SpiritBlossomSkin.jpg?eed07",
        "description" => "A mystical fox spirit from the realm of dreams and magic. She guides lost souls through the spirit world with grace and ethereal beauty."
    ]
];

$wiwiwi = [
    "Epic" => "#6b5cff",
    "Legendary" => "#ff9b00",
    "Mythic" => "#d400ff",
    "Ultimate" => "#00e6ff",
];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>League Skin Market</title>

<style>
    <?php include 'css/styles.css'; ?>
</style>
</head>

<body>

<div class="skin-market-wrapper">
<div class="skin-market-title">SKIN MARKET</div>
<div class="skin-grid">

<?php foreach ($cardskins as $wiwiIndex => $skincard): 
$wooColor = $wiwiwi[$skincard["tier"]] ?? "#FFF";
?>
<div class="scroll-wrapper">
<div class="skin-scroll" data-index="<?= $wiwiIndex ?>">

<div class="scroll-front" style="border-color:<?= $wooColor ?>">
<div class="scroll-front-overlay" style="background:<?= $wooColor ?>22"></div>
<div class="champ-name" style="color:<?= $wooColor ?>">???</div>
<div class="skin-title">Click to Reveal</div>
</div>

<div class="scroll-back" style="border-color:<?= $wooColor ?>">
<img src="<?= $skincard["image"] ?>" class="card-image">
<div class="card-info">
<div class="champ-name"><?= $skincard["champion"] ?></div>
<div class="skin-title"><?= $skincard["skinName"] ?></div>
<div class="tier-badge" style="color:<?= $wooColor ?>;border:1px solid <?= $wooColor ?>"><?= $skincard["tier"] ?></div>
<div class="essence-cost"><?= $skincard["essence"] ?> RP</div>
</div>
</div>

</div>
</div>
<?php endforeach; ?>

</div>
</div>

<!-- Modal system, for when the card is clicked they go "wooo" and pop up at the front -->
<div class="modal-overlay" id="modalwoo">
<div class="modal-content" id="modalweee">
<div class="modal-close" onclick="wompwompmodal()">×</div>
<img id="wurmpmodal" class="modal-image">
<div class="modal-details">
<div class="modal-champion-name" id="wiwichampion"></div>
<div class="modal-skin-name" id="wiwiskin"></div>
<div class="modal-tier-badge" id="wiwitier"></div>
<div class="modal-essence" id="wiwiessence"></div>
<div class="modal-description" id="wiwidesc"></div>
</div>
</div>
</div>

<script>
    // Responsible for the whole card flipping action //
const wiwiwiData = <?= json_encode($cardskins) ?>;
const wiwiColors = <?= json_encode($wiwiwi) ?>;
const wompSet = new Set();

document.querySelectorAll('.skin-scroll').forEach(skincard=>{
skincard.onclick = ()=>{
let wooIndex = +skincard.dataset.index;
if(wompSet.has(wooIndex)) modalwooOpen(wooIndex)
else{skincard.classList.add("flipped"); wompSet.add(wooIndex);}
}
});

function modalwooOpen(wooIndex){
let wurmp = wiwiwiData[wooIndex], wobble=wiwiColors[wurmp.tier]||"#fff";
wurmpmodal.src=wurmp.image;
wiwichampion.textContent=wurmp.champion;
wiwiskin.textContent=wurmp.skinName;
wiwitier.textContent=wurmp.tier;
wiwitier.style.borderColor=wobble;
wiwitier.style.color=wobble;
wiwiessence.textContent=wurmp.essence+" RP";
wiwidesc.textContent=wurmp.description;
modalweee.style.borderColor=wobble;
modalwoo.classList.add("active");
}

function wompwompmodal(){ modalwoo.classList.remove("active"); }

modalwoo.onclick = e => { if(e.target===modalwoo) wompwompmodal(); }
</script>

</body>
</html>
