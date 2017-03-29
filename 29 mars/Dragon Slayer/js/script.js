var slaying = true;
var youHit = Math.floor(Math.random() * 2);
var totalDamage = 0;
var playerHp = 100;
var dragonHp = 100;

function dragonSlayer() {
    while(slaying) {
        var damageThisRound = Math.floor(Math.random() * 50 + 1);
        console.log("Player HP: " + playerHp);
        console.log("Dragon HP: " + dragonHp);
        if(youHit) {
            totalDamage += damageThisRound;
            console.log("You did " + totalDamage + " damage!");
            console.log(" ");
            dragonHp -= totalDamage;
            if(dragonHp <= 0) {
                console.log("Player HP: " + playerHp);
                console.log("Dragon HP: 0");
                console.log("YOU WIN!");
                slaying = false;
            } else {
                totalDamage = 0;
                youHit = Math.floor(Math.random() * 2);
            }
        } else {
            totalDamage += damageThisRound;
            console.log("The dragon did " + totalDamage + " damage!");
            console.log(" ");
            playerHp -= totalDamage;
            if(playerHp <= 0) {
                console.log("Player HP: 0");
                console.log("Dragon HP: " + dragonHp);
                console.log("YOU ARE DEAD!");
                slaying = false;
            } else {
                totalDamage = 0;
                youHit = Math.floor(Math.random() * 2);
            }
        }
    }
};

dragonSlayer();