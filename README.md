# Warzone Stats
This is a script / website that allow you to generate and download a CSV file
with your the selected player of your choice.

This program will generate a CSV file and write these data:
* Player Name
* Total Match
* Wins
* % Wins
* Top 10
* % Top 10
* K/D ratio

This program use call of duty warzone [RapidAPI](https://rapidapi.com/elreco/api/call-of-duty-modern-warfare?endpoint=apiendpoint_7b24ab76-c940-42f6-9aac-5993cdc5d777)

Do not forget to add your own API credentials in this file `asset/main.php`

## Config
You can configure the list of players in this file
`config/config.php`

Like below 
```php 
'NicoYam%232394' => 'battle'
```
Here I used my BattleNet gamer tag.

*NB: Use '%23' instead of '#'*

You can select the player's platform using one of those elements:
* psn
* steam
* xbl
* battle
* uno (Activision ID)
* acti (Activision Tag)

## HOW TO USE
### Script
#### Go to asset/ and run:
```
php main.php
```

#### Web browser
You can download directly the CSV file.