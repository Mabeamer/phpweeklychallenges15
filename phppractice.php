<?php
// NORMAL:
// Use two foreach loops to create a master array of all 52 cards in the array $deck, each represented as a key value pair in the format ‘face of suit’, use the print_r function to print out the contents of the $deck to make sure it is correct.
// EX: “King of Spades” should be one of the elements of the array and it should have a value of 13.
$deck  = array();
$player1 = [];
$playerArray = array();
$num_players = 4;
$num_cards_in_deck = deckCount();//find a function to count the # of elements in an array


function createDeck(){
	$suits = array(
	    "clubs",
	    "diamonds",
	    "hearts",
	    "spades"
	);
	$faces = array(
	    "Ace" => 1,
	    "2" => 2,
	    "3" => 3,
	    "4" => 4,
	    "5" => 5,
	    "6" => 6,
	    "7" => 7,
	    "8" => 8,
	    "9" => 9,
	    "10" => 10,
	    "Jack" => 11,
	    "Queen" => 12,
	    "King" => 13
	);

	    foreach ($suits as $suit) {
	        foreach ($faces as $face => $value) {
	            // echo $suit . $v . ' </ br>';
	        	// $deck["$face of $suit"] = new stdClass();
	        	$deck[]="$face of $suit";
	        	// $deck["$face of $suit"]-> face = $face;
	        	// $deck["$face of $suit"]-> suit = $suit;
	        	// $deck["$face of $suit"]-> owner = "dealer";
	        }
	    }
	// shuffle($deck);
	// print_r ($deck);
	return $deck;
}
// MEDIUM:
//   Let’s bring in the deck code from the past example (your normal challenge). check
// Create a function that will create a deck of cards, randomize it and then return the deck. 
// We will now create a function to deal these cards to each user. Modify this function so that it returns the number of cards specified for the user. Also, it must modify the deck so that those cards are no longer available to be distributed.
function getValue($cardName){
	$value = 0;
	if( substr($cardName, 0, 4) == "King") $value = 13;
	if( substr($cardName, 0, 5) == "Queen") $value = 12;
	if( substr($cardName, 0, 4) == "Jack") $value = 11;
	if( substr($cardName, 0, 2) == "10") $value = 10;
	if( substr($cardName, 0, 1) == "9") $value = 9;
	if( substr($cardName, 0, 1) == "8") $value = 8;
	if( substr($cardName, 0, 1) == "7") $value = 7;
	if( substr($cardName, 0, 1) == "6") $value = 6;
	if( substr($cardName, 0, 1) == "5") $value = 5;
	if( substr($cardName, 0, 1) == "4") $value = 4;
	if( substr($cardName, 0, 1) == "3") $value = 3;
	if( substr($cardName, 0, 1) == "2") $value = 2;
	if( substr($cardName, 0, 1) == "1") $value = 1;
	if( substr($cardName, 0, 3) == "Ace") $value = 1;
	return $value;
}
function dealCard($playerIdx){
	global $deck;
	global $playerArray;
	$currentCard = $deck[0];
	$newDeck = array();
	for($i = 1; $i < count($deck); $i++){
		array_push($newDeck, $deck[$i]);
	}
	$deck = $newDeck;
	array_push($playerArray[$playerIdx]->cards, $currentCard);
	return $currentCard;
}

function deckCount(){
	global $deck;
}
function createPlayers($players){
	global $playerArray;
	for($i = 0; $i < $players; $i++){
		$tmpPlayer = new stdClass();
		$tmpPlayer->position = $i;
		$tmpPlayer->deltHand = 0; 
		$tmpPlayer->cards = array();
		array_push($playerArray, $tmpPlayer);
	}
}
// // HARD:
// // Bring in your createDeck and dealCards function from the previous challenges. For the specified number of players below, assign each player an even set of cards.
// // We will do this by counting out how many players there are, counting how many cards are in the deck and then dividing them so we know how many cards each player should get.
// Use a for loop to add the "dealt hands" to the $players array
// Let’s create a simple game. Each player will play a card and whoever has the highest value wins. If there are 2 cards played that have the same value, everyone loses and that round is a draw. Store the results of each game and also who won that round as the value.
// If the round is a draw, store the value as DRAW. Use a loop to play each game until all opponents are out of cards. Print out the array of all the rounds. If there was a draw, the round should say DRAW.
// If a player has won, it should displayer “Player X” where X is the index of the player.

function playOneRound(){
	// get one card from all players
	global $playerArray;
	$cardsHeld = [];
	for($i = 0; $i < count($playerArray); $i++){
		array_push($cardsHeld, $playerArray[$i]->cards[0]);
	}
	echo "<br> cards middle of table:";
	print_r($cardsHeld);
	// determine who has highest card value
	$highestCard = 0;
	$winningPlayer = "";
	for($i = 0; $i < count($cardsHeld); $i++){
		// print_r(getValue($cardsHeld[$i]));
		if(getValue($cardsHeld[$i]) > $highestCard){
			$highestCard = getValue($cardsHeld[$i]);
			$winningPlayer = $i;
		}
	}
	print "<br>highest card = $highestCard <br>";
	print "winning player = Player $winningPlayer <br>";
	// if same value everyone loses
	for($i = 0; $i < count($cardsHeld); $i++){
		for($q = 0; $q < count($cardsHeld); $q++){
			if(getValue($cardsHeld[$i]) == getValue($cardsHeld[$q]) && $i != $q){
				print "draw - Everyone Loses <br>";
			}
		}
	}
}

// creating the players

print"Number of players $num_players <br>";
createPlayers($num_players);
echo"Players Array: <br>";
print_r($playerArray);


// creating the deck
echo "</br></br> create deck:";
$deck = createDeck();
print_r ($deck);

shuffle($deck);



$num_cards_in_deck = count($deck);
$num_cards_to_give_each_player = $num_cards_in_deck / $num_players;
echo "<br/></br> number of cards per player " . $num_cards_to_give_each_player . " <br>";
for($i = 0; $i < $num_cards_to_give_each_player; $i++){
	dealCard(0);
	dealCard(1);
	dealCard(2);
	dealCard(3);
}
echo "</br></br> playing round <hr>";
playOneRound();


?>