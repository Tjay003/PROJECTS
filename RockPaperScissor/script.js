var userScore = 0;
var computerScore = 0;

function playGame(playerMove) {
    var moves = ['rock', 'paper', 'scissors'];
    var computerMove = moves[Math.floor(Math.random() * moves.length)];

    var result = getResult(playerMove, computerMove);
    document.getElementById('result').innerHTML = result;
    document.getElementById('opponent-move').innerHTML = "Opponent chose: " + computerMove;

    updateScore(result);
}

function getResult(playerMove, computerMove) {
    if (playerMove === computerMove) {
        return "It's a tie!";
    } else if (
        (playerMove === 'rock' && computerMove === 'scissors') ||
        (playerMove === 'paper' && computerMove === 'rock') ||
        (playerMove === 'scissors' && computerMove === 'paper')
    ) {
        return "You win!";
    } else {
        return "You lose!";
    }
}

function updateScore(result) {
    var userScoreElement = document.getElementById('user-score');
    var computerScoreElement = document.getElementById('computer-score');

    if (result === "You win!") {
        userScore++;
    } else if (result === "You lose!") {
        computerScore++;
    }

    userScoreElement.innerHTML = userScore;
    computerScoreElement.innerHTML = computerScore;
}

function resetScore() {
    userScore = 0;
    computerScore = 0;
    document.getElementById('user-score').innerHTML = userScore;
    document.getElementById('computer-score').innerHTML = computerScore;
}
