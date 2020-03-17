<?php
    $file = STDIN;
    // $file = fopen('data', 'r');

    sscanf(fgets($file), "%d\n", $n);
    for ($i = 0; $i < $n; $i++) {
        sscanf(fgets($file), "%d %f %s\n", $game, $bid, $bet);
        $bets[] = [ 'game' => $game, 'bid' => $bid, 'bet' => $bet ];
    }
    sscanf(fgets($file), "%d\n", $n);
    for ($i = 0; $i < $n; $i++) {
        sscanf(fgets($file), "%d %f %f %f %s\n", $game, $l, $r, $d, $outcome);
        $games[$game] = [ 'L' => $l, 'R' => $r, 'D' => $d, 'outcome' => $outcome ];
    }

    $totalLoss = $totalIncome = 0;
    foreach ($bets as &$bet) {
        $totalLoss += $bet['bid'];
        $game = &$games[$bet['game']];
        if ($bet['bet'] == $game['outcome']) {
            $totalIncome += $bet['bid'] * $game[$bet['bet']];
        }
    }
    $totalProfit = $totalIncome - $totalLoss;

    $file = STDOUT;
    // $file = fopen('result', 'w');

    fputs($file, "$totalProfit\n");
    // fputs($file, "Loss: $totalLoss, income: $totalIncome, profit: $totalProfit\n");
?>
