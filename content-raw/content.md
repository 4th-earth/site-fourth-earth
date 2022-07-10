<article id="main">

# 4th Earth: Rules as Written

Version: 0.1.0

<nav id="toc" role="region" aria-live="polite" data-open="false">
<button id="toc-toggle" aria-expanded="false" aria-controls="toc" onclick="toggleTOC()"><span>open</span> <abbr title="table of contents">TOC</abbr></button>

- [Difficulty rating](#difficulty-rating)
	- [Difficulty rating table](#difficulty-rating-table)
- [Dice pools](#dice-pools)
- [Proficiency ranks](#proficiency-ranks)
- [Life batteries](#life-batteries)
- [Characters](#characters)
- [Setting](#setting)
- [Time and space](#time-and-space)
- [Social contract](#social-contract)
- [Glossary](#glossary)

</nav>

4th Earth [.rules as written](RAW) is designed for collaborative storytelling, home brewing, and hacking. From the mundane, theatre of the absurd, to the fanciful and super-heroic, whether you're solo-adventuring or in a group, 4th Earth RAW gives you a set of mechanics to keep the mystery and challenge alive.

Players personify one or more [Characters](#characters) who interact with the [Setting](#setting) and other Characters.

These are the guidelines and guardrails for 4th Earth RAW a framework for creating [.table-top role playing games](TTRPGs). The [Vanilla Implementation](/vanilla/) illustrates one method for applying the rules as written to create a TTRPG.

4th Earth RAW presumes little previous experience with TTRPGs; defined terms are title-cased and their definitions are available in the glossary for each implementation. It should be presumed if there is not an explicit rule for or against something, Players MAY do whatever they like.

4th Earth RAW uses the key words described in [Key words for use in RFCs to Indicate Requirement Levels](https://datatracker.ietf.org/doc/html/rfc2119), the all-caps are not screaming at you:

- MUST, REQUIRED, or SHALL, mean that the definition is an absolute requirement of the specification;
- MUST NOT or SHALL NOT, mean that the definition is an absolute prohibition of the specification;
- SHOULD or RECOMMENDED, mean that there may exist valid reasons in particular circumstances to ignore a particular item, but the full implications must be understood and carefully weighed before choosing a different course;
- SHOULD NOT or NOT RECOMMENDED, mean that there may exist valid reasons in particular circumstances when the particular behavior is acceptable or even useful, but the full implications should be understood and the case carefully weighed before implementing any behavior described with this label; and
- MAY or OPTIONAL, mean that an item is truly optional.

**Equipment:** We RECOMMEND Players use standard polyhedral dice, however, any means by which choosing one or more random numbers between 1 and 12 will do; the dice would be:

- 4-sided,
- 6-sided,
- 8-sided,
- 10-sided, and
- 12-sided.

4th Earth RAW is created with the following values in mind:

- **Additive over reductive.** Players SHOULD be able to start from a simple foundation and add to it, instead of starting from a position of "everything and the kitchen sink" and reducing.
- **Narrative over simulation.** Players SHOULD be able to focus on creating engaging stories without strictly replicating reality.
- **Flow over grinding.** Players SHOULD be able to get lost in their story and Character Actions without performing repetitive tasks.
- **Power ceilings over threat escalation.** The Setting SHOULD NOT require becoming ever more dangerous for everyone, including the Characters, to keep tension in the story. Characters MAY become more powerful, they SHOULD NOT become invincible.
- **Progressive disclosure over saturation.** Players SHOULD be able to enter a story having never read the specification and learn as they go.

## Difficulty Rating

Character Actions consist of the following, minimal, list of activities:

1. Character intent; the Player describes what the Character will attempt to do.
2. The intent MUST be assigned an Initial Difficulty Rating between 0 and Infinite.
3. The Initial Difficulty Rating MAY be adjusted up or down.
4. The Player MAY create a [Dice Pool](#dice-pools) based on the Adjusted Difficulty Rating and rolls to determine success or failure.

Actions are resolved by answering: Was the Action successful? and How were the Setting and other Characters affected by the Action?

- Difficulty Rating 0 MUST represent automatic success.
- Difficulty Rating Infinite MUST be impossible for the Character to achieve in the Setting.
- Difficulty Ratings MUST NOT be less than 0.
- Difficulty Ratings MUST be whole numbers.
- Difficulty Ratings SHOULD be based on the Character attempting the Action, the complexity of the Action, and qualities of any opposing force (standing up may be Difficulty 6 for an infant and Difficulty 0 for an able-bodied adult).
- Players SHOULD be able to influence the Difficulty Rating in one or more ways.

### Difficulty Rating Table

<div is="table">

|Level    |Sides          |Human-friendly             |Opposing value |
|:-------:|:-------------:|:--------------------------|:-------------:|
|0        |0              |Done!                      |Infinite       |
|1        |2              |Safe bet                   |7              |
|2        |4              |Simple                     |6              |
|3        |6              |Difficult                  |5              |
|4        |8              |Long shot                  |4              |
|5        |10             |Leap of faith              |3              |
|6        |12             |Inconceivable              |2              |
|7        |No dice!       |Impossible, if not reduced |1              |
|Infinite |non-applicable |Impossible                 |0              |

</div>

*Note: Multiplying the Difficulty Rating by 2 results in the number of sides for the dice in the [Dice Pool](#dice-pools).*

## Dice pools

Dice Pools are a collection of dice.

- The numeric range of dice in the pool MUST be determined by the Adjusted [Difficulty Rating](#difficulty-rating) in the [Difficulty Rating table](#difficulty-rating-table).
- The number of dice in the pool MUST NOT exceed the number of [Proficiency Ranks](#proficiency-ranks) applied to the Action; SHOULD NOT include parent Proficiency Ranks.
- Dice Pools MUST have at least 1 die regardless of Difficulty Rating or Proficiency Ranks; referred to as the Base Die.
- Rolling 1 on a single die in the Dice Pool MUST represent successful completion of the Action.
- Dice Pools SHOULD NOT exceed 5 dice, which keeps the pool manageable and allows room for additional dice to facilitate things like critical success, failure, or both.

## Proficiency Ranks

Proficiency Ranks represent the level of proficiency a [Character](#characters) has performing certain Action Types, using a Tool, or combination. Proficiency Points are sub-aspects of a Proficiency Rank.

- Each Rank MUST require earning two or more Proficiency Points toward the Rank.
	- Each Rank SHOULD be achievable in roughly four attempts.
	- Proficiency Points SHOULD NOT be earned if the Difficulty Rating is 0.
- The implementation SHOULD be stable for the entire Session.
	- The implementation MAY be adjusted from Session to Session.
	- These adjustments SHOULD be minimal from one Session to the next.
- Action Types SHOULD have more possible Ranks than Tools. We RECOMMEND:
	- 4 Proficiency Points per Rank.
	- 3 Ranks per Action Type.
	- 1 Rank per Tool; general, not specific (if a Character knows how to use a knife for cooking, they know how to use it for combat; they're just better at cooking than combat).
- Each Rank MAY increase the number of dice in the [Dice Pool](#dice-pools) by 1.
- Using a Tool MAY reduce the [Difficulty Rating](#difficulty-rating) of an Action up to 2 levels.

## Life Batteries

- Batteries MUST be the same for all [Characters](#characters) in a [Setting](#setting) with the same rules applied (even non-player Characters and enemies).
	- Batteries MAY be created before play begins, however, we RECOMMEND creating Life Batteries as the story progresses based on Actions of the Characters. (Players may decide a stealth Battery is appropriate while playing and add it to all Characters).
- Batteries MUST have multiple ways to recharge.
	- Some recharging methods SHOULD be player initiated (sleep, for example).
	- The implementation SHOULD favor a "both ways" approach; if Batteries can recharge multiple ways, they SHOULD be able to drain multiple ways (starvation, for example).
- Batteries MUST NOT be a negative number.
- The number of Batteries SHOULD be kept to a minimum to reduce administrative overhead and maintain tension.
- Each Battery SHOULD have the same maximum number of Battery Points.
- Battery Points MAY be used to reduce [Difficulty Ratings](#difficulty-rating); we RECOMMEND reducing Difficulty Rating 1 level for each Battery Point spent.

## Characters

- MUST be part of one or more encompassing identities.
- MUST have one or more [Life Batteries](#life-batteries).
- SHOULD be played by the same Player with every appearance unless otherwise agreed to in the [Social Contract](#social-contract).
- SHOULD favor nurture over nature for [Proficiency Ranks](#proficiency-ranks).
- SHOULD have a unique name to distinguish Characters from one another.

Examples:

1. Teenage, male, human, cleric with a health Battery with a maximum value of 10. Grew up in a monastery where he learned healing spells.
2. Adult, female, goddess, warrior with health, physical, mental, and aura Batteries with a maximum value of 8 each. Grew up in a military family and has been training since she was old enough to walk.
3. Elderly dog with a health Battery with a maximum value of 6.

*Note: The Characters in these examples, MUST NOT be played in the same [Setting](#setting), unless the Players agree to modify the Characters to have the same Life Batteries and maximum values.*

## Setting

4th Earth RAW is a game engine and does not require a specific Setting. Further, you MAY use 4th Earth RAW in the Setting of other games.

- Setting MUST be agreed to by *all* players (including the Narrator, if applicable).
- MUST be enough to give flavor and direction; MAY be a single sentence all the way to one or more tomes.
- MUST describe where, when, what, and general theme.
- MAY be developed by the Players, a Narrator, the outside world, or anything else.
- MAY include a specific, short-term plot (adventures and one-shots).
	- MAY be a generic, long-term campaign.
	- MAY be a world open for exploration with no agenda or conflict beyond that exploration.
	- Or, MAY be a combination.

Examples:

1. Jungle, 1955, Vietnam, hospital camp, filled with ordinary people, using technology appropriate to the time; mainly for healing (a serial war story).
2. Greek mythos, The Underworld during the 12th labor of Hercules involving deities and demigods (a one-shot mythology hero quest).
3. Early 21st century, Pluto, single-cell organisms (an evolution serial).

*Note: The second and third example includes a baseline description of the [Characters](#characters) that can be played during the serialized adventure.*

## Time and Space

- Player Time SHOULD NOT be the same as Character Time.
- Players SHOULD favor cinematic over real-time.
	- Players SHOULD favor real-time over turn-based Action resolution.
- Items within the Setting MAY decay over time.
	- Characters SHOULD be able to perform maintenance Actions on items to slow the decay of those items.

## Social Contract

Much like character for the individual and culture for the group, a Social Contract will exist. The question is: How transparent, intentional, and formal is it?

Another way to look at it, the Social Contract outlines the guidelines and guardrails for meatspace.

The Social Contract:

- MUST be agreed to by all Players.
- MUST be applied to all Players in a similar manner.
- MAY be verbal or unspoken; we RECOMMEND written.
- MAY be created or modified as Players interact with each other.

Resources for developing a Social Contract:

- Large list of starter questions a Social Contract MAY address: [https://rpgmuseum.fandom.com/wiki/Social_contract](https://rpgmuseum.fandom.com/wiki/Social_contract)
- An example of a Social Contract: [https://static1.squarespace.com/static/5512e30de4b018f9300e3a55/t/57802bb3bebafbf78186bc68/1468017592481/Downloadable+Social+Contract.pdf](https://static1.squarespace.com/static/5512e30de4b018f9300e3a55/t/57802bb3bebafbf78186bc68/1468017592481/Downloadable+Social+Contract.pdf)

## Glossary

Adjusted Difficulty Rating
:    The Initial Difficulty Rating after all adjustments have been taken into account.

Action
:    One or more activities attempted or performed within the Setting.
:    MAY NOT be restricted to Characters within the Setting.

Action Type
:    Represents an Action or collection of Actions that can be improved over time.

Base Die
:    The first die in a Dice Pool, regardless of Proficiency Ranks.

Battery Point
:    A sub-aspect of a Life Battery.

Character
:    A noun personified in the Setting of the game.

Character Time
:    The amount of time that passes for Characters within the Setting.

Dice Pool
:    A collection of dice, or random numbers within a range.
:    Used for resolving Actions.

Difficulty Rating
:    The main Action mechanic for Characters to interact with the Setting and other Characters.

Fast Action
:    An Action performed by a Character, with one or more related Difficulty Rating(s), which MAY be performed multiple times per Turn.

Initial Difficulty Rating
:    The Difficulty Rating initially assigned to an Action prior to any adjustments.

Life Battery (or Battery)
:    Represents the life force of a Character.

Narrator
:    A Player who has additional responsibilities, which MAY include setting Difficulty Ratings, adding flavor to the story, and other duties often taken by a Game or Dungeon Master.

Player
:    A sentient being who is participating in the playing of the game.
:    MAY personify one or more Characters within the Setting of the game.

Player Time
:    The amount of time that passes for Players playing the game.

Proficiency Point
:    A sub-aspect of a Proficiency Rank earned in order to achieve a Rank.

Proficiency Rank (or Rank)
:    A representation of how proficient a Character is at performing certain Action Types or using a Tool.

Round
:    Ends after Character Actions have been resolved for all active Characters.

Session
:    Ends when Players stop playing the game for a given period of time; breaks during a Session do not constitute a break in the Session.

Setting
:    The attributes and surroundings, in aggregate, that Characters inhabit.

Slow Action
:    An Action performed by a Character, with related Difficulty Rating, which MAY be performed up to once per Turn.

Social Contract
:    An agreement or understanding between Players (including the Narrator, if applicable) about how they will behave towards each other.

Tool
:    An item within the Setting that can be used by a Character.

Turn
:    Ends after all Fast and Slow Actions have been performed by a Character.

<article>

<p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><span property="dct:title">4th Earth RAW, 4th Earth RAW: Vanilla, and 4th Earth RAW: Sprinkles</span> by <span property="cc:attributionName">Alexander Midknight</span> is licensed under <a href="http://creativecommons.org/licenses/by-sa/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer">Attribution-ShareAlike 4.0 International.<br><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1"></a></p>
