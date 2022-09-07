# 4th Earth RAW: Sprinkles

<nav id="toc" role="region" aria-live="polite" data-open="false">
<button id="toc-toggle" aria-expanded="false" aria-controls="toc" onclick="toggleTOC()"><span>open</span> <abbr title="table of contents">TOC</abbr></button>

- [Turn-based action resolution](#turn-based-action-resolution)
	- [Action deck](#action-deck)
	- [Difficulty rating based](#difficulty-rating-based)
	- [Modified die roll](#modified-die-roll)
- [Advanced Technology and Magic](#advanced-technology-and-magic)
	- [Rarity of Tool or Spell](#rarity-of-tool-or-spell)
	- [Target of Tool or Spell](#target-of-tool-or-spell)
	- [Intent of Protagonist](#intent-of-protagonist)
	- [Distance from Protagonist](#distance-from-protagonist)
	- [Internal or External to Target](#internal-or-external-to-target)
- [Allies](#allies)
- [Criticality](#criticality)
	- [Mundane Success](#mundane-success-criticality)
	- [Mundane Failure](#mundane-failure-criticality)
	- [Aggressive Success](#aggressive-success-criticality)
	- [Aggressive Failure](#aggressive-failure-criticality)
- [Death, Resurrection, and Reincarnation](#death-resurrection-and-reincarnation)
- [Inter-character Battery Point Transfer](#inter-character-battery-point-transfer)
- [Opposing Difficulty Rating](#opposing-difficulty-rating)
- [Partials and Complications](#partials-and-complications)
- [Resistance](#resistance)
- [Re-roll](#re-roll)
- [Scale](#scale)
	- [Antagonist Difficulty Rating](#antagonist-difficulty-rating-scale)
	- [Resistance](#resistance-scale)
- [Stance](#stance)
	- [Antagonist Difficulty Rating](#antagonist-difficulty-rating-stance)

</nav>

4th Earth RAW: Sprinkles are individual, official mechanics that MAY be sprinkled on top of 4th Earth RAW: Vanilla or your own 4th Earth RAW specification.

*Note: Sprinkles add complexity to gameplay.*

## Turn-based action resolution

[Version](/versioning/): 0.1.1

### Action deck

- Each Round, Players MUST draw one card from a standard 52 deck of playing cards for each Character they’re playing; no jokers or specialty cards.
- Actions MUST be resolved from highest to lowest.
	- Ties MUST be resolved in alphabetical order of suit names; clubs, diamonds, hearts, spades.
	- Players SHOULD decide prior to drawing whether the ace represents 1 (lowest), 14 (highest), or, if the Player can choose to be lowest or highest (a special feature of drawing an ace).

### Difficulty rating based

- Each round, Characters MUST decide what they will attempt to do. All Actions MUST be given a Difficulty Rating. All Players MUST modify the Difficulty Rating.
- Resolution SHOULD be from the most difficult to the least.
	- Ties SHOULD favor Player Characters.

### Modified die roll

- Players MUST roll a 12-sided die and add the total of their unspent Battery Points.
- Turn order MUST be resolved in descending order.
	- Ties SHOULD favor Player Characters.

## Advanced Technology and Magic

[Version](/versioning/): 0.1.0

The following mechanics MAY be applied to both advanced technology Tools and magic.

- The use of advanced technology Tools and magic MUST use two rolls and Dice Pools.
	- The first Difficulty Rating MUST represent the difficulty of using the advanced technology or casting a spell.
	- The second Difficulty Rating SHOULD use the Antagonist Difficulty Rating mechanic.
- If the Difficulty Rating of using the Tools or casting the spell exceeds 7, the Difficulty Rating SHOULD be set at 7.
- Difficulty Rating to use MUST start at 0 and SHOULD be adjusted using the tables below.
	- Initial Difficulty Rating SHOULD be greater than 0 and MUST NOT be less than 0.
	- We RECOMMEND using all the tables, however, Players MAY pick and choose, or, build their own.
		- The tables used SHOULD remain consistent for an entire session.
- Players SHOULD specify whether Items, Tools, and similar are considered advanaced technology and magic.

### Rarity of Tool or Spell

<div is="table">

|Rarity     |Modification |
|:----------|:-----------:|
|Ubiquitous |0            |
|Common     |Plus 1       |
|Uncommon   |Plus 2       |
|Rare       |Plus 3       |

</div>

### Target of Tool or Spell

<div is="table">

|Target           |Modification |
|:----------------|:-----------:|
|Inanimate object |Plus 1       |
|Self             |Plus 2       |
|Another          |Plus 3       |

</div>

### Intent of Protagonist

<div is="table">

|Intent   |Modification |
|:--------|:-----------:|
|Survival |0            |
|Heal     |Plus 1       |
|Harm     |Plus 2       |

</div>

### Distance from Protagonist

<div is="table">

|Distance |Modification |
|:--------|:-----------:|
|Touch    |0            |
|Distance |Plus 1       |
|Ranged   |Plus 2       |

</div>

### Internal or External to Target

Some advanced technology or magic MAY move from the Protagonist to the target (external) while others may start *within* the target (internal).

- External technology and magic SHOULD be impacted by Resistance, if applicable.

<div is="table">

|Attribute |Modification                                             |
|:---------|:-------------------------------------------------------:|
|Internal  |0                                                        |
|External  |Target Difficulty Rating divided by 4; rounded down. |

</div>

## Allies

[Version](/versioning/): 0.1.0

- An active ally MUST be a Character who has the ability to perform Actions during a round and those Actions will be in support of the Protagonist or Antagonist, not both.
- If the Antagonist has active allies, the Difficulty Rating MUST be increased by 1 for every 2 active allies. (1 active ally MUST NOT result in an increase, 4 active allies SHOULD result in an increase of 2.)
	- If the Protagonist has active allies, the Difficulty Rating MAY be reduced in the same way as it is increased for the Antagonist. (Both have 2 active allies, Difficulty Rating MAY NOT change based on allies.)

## Criticality

[Version](/versioning/): 0.1.0

Criticality represents success *and* failure beyond the intention of the Character for mundane and aggressive Actions.

- Characters SHOULD have one or more non-health Life Batteries, or, some aspects of the RECOMMENDED resolution tables MUST be altered.
- Players MUST add an extra die to the Dice Pool, which is known as the Criticality Die and SHOULD be distinct from other dice in the pool; we RECOMMEND using a die with the same number of sides or greater.
	- The die MAY be changed per Session or Action.
- If a 1 is rolled on the Criticality Die, the result is a critical success or failure based on the success or failure of the rest of the Dice Pool, respectively.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool.
	- Players SHOULD decide whether they will apply the Critically Die prior to becoming aware of the Difficulty Rating assigned to the Action.
	- Players MAY decide to always roll a Criticality Die as a group decision (part of the [Social Contract](/#social-contract)). We RECOMMEND the decision be made prior to the beginning of the Session.
- Beyond the narrative implications and outcomes, Criticality SHOULD come with mechanical impacts on the Character.

### Mundane Success: Criticality

A critical success on a non-combat (mundane) action, results in the following changes to the Target Action Battery.

- MUST NOT be the health Battery.
- If the Target Action Battery becomes full, the Player MAY distribute the remaining points to other non-health Batteries.

The Player rolls one, 12-sided die.

<div is="table">

|Die value   |Affect on Target Action Battery |
|:-----------|:------------------------------:|
|Even number |Plus 1                          |
|1, 5, or 9  |Plus 2                          |
|3 or 7      |Plus 3                          |
|11          |Plus 5                          |

</div>

### Mundane Failure: Criticality

Critical, mundane failure is the opposite of a Critical, mundane success.

- MUST subtract the affect in the Critical, mundane success table.
- If the Target Action Battery reaches 0, the Player MUST spend the remaining points against other non-health Batteries.
	- Players SHOULD NOT use other Life Batteries to recharge the Target Action Battery as part of the resolution of Critical, mundane failure.

### Aggressive Success: Criticality

This implementation presumes 4th Earth RAW: Vanilla. Players MAY replace Potential Energy with the label they use to calculate a draining affect on the health battery (damage).

The Player rolls one, 12-sided die.

<div is="table">

|Die value   |Effect                                                                                                              |
|:-----------|:-------------------------------------------------------------------------------------------------------------------|
|Even number |Plus 1 to Protagonist Target Action Battery, or, any other non-health Battery if the Target Action Battery is full. |
|1, 5, or 9  |Multiply base Potential Energy by 1.5; MUST be rounded up or down.                                                  |
|3 or 7      |Multiply base Potential Energy by 2.                                                                                |
|11          |Trauma: Roll another 12-sided die and apply result from the Critical, Aggressive Success Extension table.           |

</div>

#### Aggressive Success Extension Table: Criticality

The Player rolls one, 12-sided die.

<div is="table">

|Die value  |Effect |
|:----------|:-----------------------------------------------------------------------------------------------------|
|1          |Antagonist Difficulty Rating reduced by 2, Recurring and Compounding                                  |
|2, 5, or 8 |Multiply base Potential Energy by 2, target Antagonist.                                               |
|3, 6, or 9 |Multiply base Potential Energy by 2.5, target Antagonist; MUST be rounded up or down.                 |
|4 or 7     |Reduce Antagonist's spirit Battery by 1; use health Battery if Spirit battery is unavailable or at 0. |
|10         |Reduce Antagonist’s health Battery by 1, Recurring and Compounding.                                   |
|11         |Multiply base Potential Energy by 3, target Antagonist.                                               |
|12         |Antagonist can’t act for 2 rounds; no longer considered an Active Character.                          |

</div>

*A note on Recurring and Compounding: A Protagonist is fighting an Antagonist with a Difficulty Rating 6; based on Proficiency Ranks in the Protagonist's Action. The Player rolls a Critical, success resulting in the Difficulty Rating being reduced by 2, becoming a Difficulty Rating 4. Every following round, the Antagonist’s Difficulty Rating will be 4 (Recurring). If the Player manages to roll the same Critical, aggressive success a second time, the Antagonist’s Difficulty Rating becomes 2 (compounding). This could increase to the point where the Antagonist’s Difficulty Rating becomes 0.*

### Aggressive Failure: Criticality

The Player rolls one, 12-sided die.

<div is="table">

|Die value   |Effect                                                                                                                   |
|:-----------|:------------------------------------------------------------------------------------------------------------------------|
|Even number |Minus 1 from Protagonist's Target Action Battery, or, any other non-health Battery, if the Target Action Battery is at 0 |
|1, 5, or 9  |Minus 2 from Protagonist's Target Action Battery, does not impact other Life Batteries, if Target Action Battery is at 0 |
|3 or 7      |Protagonist damages self at one-to-one Scale, 0 resistance, Potential Energy divided by 2 (round down); Potential Energy MUST be greater than 0. |
|11          |Trauma: Roll another 12-sided die and apply result from the Critical, Aggressive Failure Extension table.                |

</div>

#### Aggressive Failure Extension Table: Criticality

The Player rolls one, 12-sided die.

<div is="table">

|Die value |Effect                                                                                                                            |
|:---------|:---------------------------------------------------------------------------------------------------------------------------------|
|11        |Tool used is rendered useless for future Rounds. If no Tool is used, multiply Potential Energy by 3, target the Protagonist. |
|Other     |Apply Critical, Aggressive Success Extension table replacing the word “Antagonist” with “Protagonist.”                             |

</div>

## Death, resurrection, and reincarnation

[Version](/versioning/): 0.1.0

- If a Character dies, 1 Proficiency Point SHOULD be removed from all completed Proficiency Ranks; including Tools. This represents relearning or recovering while maintaining memory.
- If a Character is resurrected, the health battery MUST be set to 1; all other batteries MUST be set to 0.
	- The Character MUST die and the impact of death applies.
    - 1 Proficiency Point SHOULD be removed from all Proficiency Ranks; including partials.
	- The Character is the same character and MAY retain possessions.
- If a Character is reincarnated:
	- The Character MUST die and the impact of death applies.
	- The Character MUST be considered resurrected and the impact of resurrection applies.
	- The Character loses all physical possessions they had with them at the time of death.
        - The Character MAY return where they died and MAY recover some or all of their items; consider things like decay, environment, and theft.
	- The Character, if maintained as the same Character, SHOULD appear in their hometown (place of birth) or place of residence.
        - If considered a different Character, MUST NOT appear near the Character who died.

## Inter-Character battery point transfer

[Version](/versioning/): 0.1.0

This Sprinkle affords one Character to assist another Character by transferring Life Battery points to the other Character.

- The Difficulty Rating to perform the transfer MUST apply to the assisting Character.
- The transfer MUST be from the same Life Battery the point will be transferred to.
- Players MAY transfer Battery Points from a Character they control to another Character in the Setting; the Initial Difficulty Rating MUST be based on distance between Characters:
	- Touch: Difficulty 0.
	- Distance (usually line of sight): Difficulty 1.
	- Ranged (MAY be out of sight): Difficulty 2.
- Players MAY increase the Initial Difficulty Rating.
- The Difficulty Rating to assist SHOULD be less than the Initial Difficult Rating of the Action being performed by the assisted Character.
- Assisting SHOULD NOT require movement by the assisting character.

## Opposing Difficulty Rating

[Version](/versioning/): 0.1.0

This Sprinkle is designed to aid:

1. solo-adventuring (the Player is not rolling *for* another, non-Player Character),
2. introduce opposing rolls (Players can go "head-to-head" with rolls), or
3. both.

- If using opposing rolls between two Players, two Actions MUST be created; one for the the Protagonist and one for the Antagonist.
	- The Initial Difficulty Rating SHOULD be for the Protagonist based on their Action against the Antagonist (see [Antagonist Difficulty Rating from 4th Earth RAW: Vanilla](/vanilla/#opposing-character-interactions)).
	- The Difficulty Rating for the Antagonist SHOULD be an opposing Difficulty Rating (see opposing value in the [Difficulty Rating Table from 4th Earth RAW](/#difficulty-rating-table)).
	- Both Players MAY reduce their Difficulty Ratings as if their Character was performing the Action.
		- The Player with the most ones rolled from their pool SHOULD win.
		- We RECOMMEND ties go to the Protagonist.
- If using opposing rolls to facilitate solo-adventuring, one Action MUST be created and SHOULD use the Difficulty Rating Table from 4th Earth RAW to determine Difficulty Rating for the Player.
	- The non-Player Character (when they are the Protagonist) MUST reduce the Antagonist Difficulty Rating to 0, if possible.
		- If the non-Player Character cannot reduce the Antagonist Difficulty Rating to 0, they MUST reduce it as much as possible.
    - If the non-Player Character's Adjusted Difficulty Rating is greater than 0, the Player uses the opposing value in the Difficulty Rating Table from 4th Earth RAW.
- If using a Criticality Die, resolution SHOULD be handled as if the non-Player Character rolled the Criticality Die and the non-Player Character SHOULD receive the affects as if they were the Protagonist.

## Partials and Complications

[Version](/versioning/): 0.1.0

This Sprinkle presumes the [Criticality Sprinkle](/sprinkles/#criticality) insofar as the Criticality Die is used. Players MAY choose to use this Sprinkle standalone.

- Players MUST add an extra die to the Dice Pool, which is known as the Criticality Die and SHOULD be distinct from other dice in the pool; we RECOMMEND using a die with the same number of sides or greater.
	- The die MAY be changed per Session or Action.
- If the highest number on the Criticality Die is rolled, the result is a partial or complication based on the success or failure of the rest of the Dice Pool.
	- A partial is a mildly positive effect on an otherwise failed Action.
	- A complication is a mildly negative effect on an otherwise successful Action.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool.
	- Players SHOULD decide whether they will apply the Critically Die prior to becoming aware of the Difficulty Rating assigned to the Action.
	- Players MAY decide to always roll a Criticality Die as a group decision (part of the Social Contract). We RECOMMEND the decision be made prior to the beginning of the Session.

## Resistance

[Version](/versioning/): 0.1.0

Resistance results in a modification to Protagonist Potential Energy (PE) when performing aggressive Actions in a way that causes physical damage; draining the health Life Battery.

Every Character SHOULD have some type of flesh with varying degrees of thickness.

<div is="table">

|Thickness |Resistance |PE adjustment |
|:---------|:---------:|:------------:|
|Thin      |Negative 1 |Plus 1        |
|Average   |0          |0             |
|Thick     |1          |Minus 1       |

</div>

Characters MAY have some type of armor.

<div is="table">

|Grade  |Resistance |PE adjustment |
|:------|:---------:|:------------:|
|None   |0          |0             |
|Light  |1          |Minus 1       |
|Medium |2          |Minus 2       |
|Heavy  |3          |Minus 3       |

</div>

Players MAY apply different modifications for specific areas of the Character (being hit where a Character isn't armored, for example).

## Re-roll

[Version](/versioning/): 0.1.0

- Players MAY spend Proficiency Points and non-health Life Battery Points to re-roll an Action.
    - When using non-health Life Battery Points, the Points SHOULD use the Target Action Battery. (Any inter-battery recharging mechanics SHOULD apply.)
- Players MAY spend 1 Point to re-roll the whole Dice Pool or 2 Points to re-roll a single die in the pool (including modifier dice, such as a Criticality Die).
- As long as the Character has Points remaining, the Player MAY continue spending Points to re-roll.

## Scale

[Version](/versioning/): 0.1.0

Scale is a way of measuring the size difference between Characters in a Setting or Scene.

- The smallest Character in a Setting or interaction SHOULD be given a Scale of 1; the Scale of other Characters is relative to 1 in whole number increments.
	- When characters are interacting, the smallest Character in the interaction SHOULD be given a Scale of 1.
	- If the interacting Characters are roughly the same size, both SHOULD be Scale 1.
- Scales MUST be in whole numbers; if a character is not twice or half the size of another, they are all scale 1.

### Antagonist Difficulty Rating: Scale

Imagine a human trying to hit a fly. The human is hundreds of times larger than the fly. The fly is very difficult to hit without tools and being sneaky.

- If the Antagonist is lesser Scale, the Difficulty Rating SHOULD be increased by 1 for each step smaller.

### Resistance: Scale

Presumes Resistance Sprinkle or similar implementation.

Imagine a fly hitting a human. The human is hundreds of times larger than the fly. The human will most likely not take damage enough to matter, even if bitten by the fly.

- We RECOMMEND using in conjunction with the [Resistance Sprinkle](/sprinkles/#resistance).
- Larger Scale Characters SHOULD have a higher Resistance, if applicable. We RECOMMEND increasing Resistance by 1 for each step greater the Antagonist is.

## Stance

[Version](/versioning/): 0.1.0

Stance affords Characters to be more or less aggressive, at a cost.

- Characters MUST be neutral in stance unless announced otherwise.
	- Players MAY decide whether the announcement should be with every Character Action, only if the Stance changes, or, in some other way.
- Changing stance MUST be considered a Fast Action.

### Antagonist Difficulty Rating: Stance

- Difficulty Rating adjustments SHOULD take the Stance of the Protagonist and Antagonist into consideration.
- If the Protagonist and Antagonist are in neutral Stance, there MUST NOT be an adjustment to the Antagonist Difficulty Rating.
	- If the Protagonist is in an offensive Stance and the Antagonist is in a defensive Stance, there MUST NOT be an adjustment.
	- If the Protagonist is in a defensive Stance and the Antagonist is in an offensive Stance, there MUST NOT be an adjustment.
- If the Protagonist and Antagonist are both in an offensive Stance, the Antagonist Difficulty Rating SHOULD be decreased by 2.
	- If the Protagonist and Antagonist are both in a defensive Stance, the Antagonist Difficulty Rating SHOULD be increased by 2.
- If the Protagonist is in an offensive Stance and the Antagonist is in a neutral Stance, the Antagonist Difficulty Rating SHOULD be decreased by 1.
	- If the Protagonist is in a defensive Stance and the Antagonist is in a neutral Stance, the Antagonist Difficulty Rating SHOULD be increased by 1.

<div is="table">

|             |P: Offensive |P: Neutral |P: Defensive |
|-------------|:-----------:|:---------:|:-----------:|
|A: Offensive |Minus 2      |Minus 1    | 0           |
|A: Neutral   |Minus 1      | 0         |Plus 1       |
|A: Defensive |0            |Plus 1     |Plus 2       |

</div>

## Glossary

Compounding
:    Compounding means the effect can be applied multiple times.

Recurring
:    Recurring means the effect is applied every Round.
