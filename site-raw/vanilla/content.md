# 4th Earth RAW: Vanilla

Creating a [.tabletop role playing game](TTRPG) can be a bit overwhelming. 4th Earth RAW: Vanilla is designed to provide a minimal setup for Players to create Characters and begin creating their stories in the spirit of [4th Earth RAW](/).

If you would like to expand these rules and mechanics and aren't sure where to start, we RECOMMEND looking at the official add-on implementations known as Sprinkles.

The vanilla implementation is designed to facilitate solo-adventuring and minimize the number of Players rolling at any given time.

## Difficulty Rating

- Difficulty MAY be reduced by spending non-health [Life Battery](#life-batteries) points; 1 Difficulty Rating for each target action battery point spent.
- Difficulty MAY be increased or decreased by negotiating with the Narrator, if applicable.

### Opposing Character Interactions 

The following apply to Character Actions where the target of the Action is a Character who is contesting the Action; if the Action isn’t contested, the Difficulty Rating MUST be 0.

- There MUST be a protagonist and an antagonist where the protagonist is the Character performing the Action.
- For mundane Actions, the initial Difficulty Rating for the protagonist MUST be at least the number of Proficiency Ranks the antagonist has in the same proficiency being used by the protagonist.
- For physically aggressive Actions:
    - Difficulty Rating MUST represent difficulty to hit the antagonist; this includes grappling, holding, or restraining the Defending Character.
    - Difficulty Rating MUST start at 0.
    - Difficulty Rating SHOULD be calculated using the Antagonist Difficulty Rating Table below.
    - Damage SHOULD be calculated using the Protagonist Potential Energy Table below.
    - Grappling, holding, or restraining MUST NOT cause damage to the Antagonist. 
        - If the Antagonist is restrained in some way, attempting to escape MUST result in the Antagonist becoming the Protagonist; SHOULD happen on the Antagonist’s turn, if applicable.



















### Harming Other Characters

- Slow Actions MUST be performed only once per round.
- Fast Actions MAY be performed twice by the Attacking Character in a turn or round.
	- If the Fast Action is performed twice the Difficulty Rating MUST be divided by 2 and split evenly between the two Actions.
		- If the Fast Action is performed twice and the Difficulty Rating is odd, Player MUST round down the first and round up the second.
		- Players MAY spend non-health Life Battery points to reduce the Difficulty Ratings individually.

#### Antagonist Difficulty Rating Table

The following table describes a method for calculating the Difficulty Rating of a Defending Character. The Difficulty Rating represents the difficulty to hit; damage is calculated by using the Attacking Character Potential Energy table below.

|Question |Answer is yes |
|:———|:-————|
|Defender is subdued? |Difficulty Rating is 0, no need to continue to further questions unless applied to the psychology and morality of the Attacking Character. |
|Defender has active allies |Plus 1 to Difficulty Rating per active ally. |
|Defender is less Scale |Plus 1 to Difficulty Rating per steps smaller in Scale. |
|Defender is aware of Attacker |Plus 1 to Difficulty Rating. |

#### Protagonist Potential Energy Table

The following table describes a method for calculating the Potential Energy of an attack, which determines how many Life Battery points will be spent if the attack is successful.

- All physical attack MUST target the health battery.
- Verbal, advanced technology, or magic attacks MAY impact non-health Life Batteries and SHOULD be a known quality or attribute of the action, technology, or spell.

|Action |Details |Potential Energy |
|:——|:-——|:—————:|
|Jab    |Fast and light |1 per Fast Action taken and successful; maximum of 2 |
|Uppercut, kick, or ram |Slow and medium |2 |
|Dual (tool each hand) |Fast and medium |2 per Fast Action taken; maximum of 4 |
|Two-handed |Slow and medium |3 |
|Advanced technology or magic |Slow and heavy |5 |

### Difficulty Ratings: Official Additions

<details>
<summary>Scale</summary>

Scale is a way of measuring the size difference between Characters in a Setting or Scene. Scale MAY affect things like Difficulty Ratings and Resistance. This implementation SHOULD be used in conjunction with other modifications.

- The smallest Character in a Setting or Scene SHOULD be given a Scale of 1; the Scale of other Characters is relative to 1 in whole number increments.
	- When characters are interacting, the smallest Character in the interaction SHOULD be given a Scale of 1.
- If the interacting Characters are roughly the same size, both SHOULD be Scale 1.
- Larger Scale Characters SHOULD have a higher resistance, if applicable.
- Smaller Scale Character SHOULD have a higher Difficulty Rating.

</details>

<details>
<summary>Stance</summary>

Stance affords Players the ability to modify the Difficulty Rating when interacting with other Characters; particularly for combat.

- Players MUST announce the Stance of their Character when describing the Action to be taken.
	- If the Stance is not announced, the Character SHOULD be considered to be in a neutral stance.
	- Players SHOULD decide whether announcing the Stance MUST happen every turn or round, or, if a Stance change remains the same until changed again.
- Changing Stance MUST be considered a Fast Action, therefore, does not take an entire turn or round.
- Changes to the Difficulty Rating SHOULD be based on the Stance of both interacting Characters using the Stance Difficulty Rating Adjustment table below (where “A” is the Attacking Character and “D” is the Defending Character).

|             |A: Offensive |A: Neutral |A: Defensive |
|-————|:————|:-———|:————|
|D: Offensive |Minus 2 |Minus 1 | 0 |
|D: Neutral   |Minus 1 | 0 |Plus 1 |
|D: Defensive |0 |Plus 1 |Plus 2 |

</details>

<details>
<summary>Resistance</summary>

Resistance results in a modification to Potential Energy when attacked in a way that causes physical damage; draining the health Life Battery.

***

</details>

## Dice Pools: Official Additions

<details>
<summary>Re-roll implementation</summary>

- Players MAY spend [Proficiency Points](#proficiency-ranks) and non-health [Life Battery](#life-batteries) points to re-roll an action.
- Players MAY spend 1 point to re-roll the whole Dice Pool or 2 points to re-roll a single die in the pool.
- As long as the Character has points remaining, the Player MAY continue spending points to re-roll.

</details>

<details>
<summary>Criticality</summary>

Criticality represents success *and* failure beyond the intention of the Character for mundane and combat actions. 

- Characters MUST have one or more non-health Life Batteries.
- Players MUST add an extra die to the Dice Pool, which is known as the Criticality Die and SHOULD be distinct from other dice in the pool; we RECOMMEND a 10-sided die, which represents a 10 percent chance of criticality.
	- The die MAY be changed per session or action.
- If a 1 is rolled on the Criticality Die, the result is a critical success or failure based on the success or failure of the rest of the Dice Pool, respectively.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool.
	- Players SHOULD decide whether they will apply the Critically Die prior to becoming aware of the Difficulty Rating assigned to the action.
	- Players MAY decide to always roll a Criticality Die as a group decision. We RECOMMEND the decision be made prior to the beginning of the session.

Beyond the narrative implications and outcomes, Criticality comes with mechanical impacts on the Character.

### Critical, mundane success

A critical success on a non-combat (mundane) action, results in the following changes to the battery targeted by the action. 

- MUST NOT be the health battery.

The Player rolls one, 12-sided die.

|Die value    |Affect on Action target battery |
|:————|:——|
|Even number  |Plus 1 |
|1, 5, or 9      |Plus 2 |
|3 or 7         |Plus 3 |
|11           |Plus 5 |

If the Action target battery becomes full, the Player MAY distribute the remaining points to other non-health batteries of their choosing.

### Critical, mundane failure

Critical, mundane failure is the opposite of a Critical, mundane success. 

- MUST subtract the affect in the Critical, mundane success table.
- If the Action target battery reaches 0, the Player MUST spend the remaining points against other non-health batteries of their choosing.
	- If using the Overflow recharging modification, Players SHOULD NOT use that mechanic to resolve the reduction of an Action target battery that’s reached 0 due to critical failure. 

### Critical, combat success

This implementation presumes you are using the vanilla implementation of combat described above.

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:————|:——|
|Even number |Plus 1 to attacker Action target battery, or, any other non-health battery if the Action target battery is full |
|1, 5, or 9      |Multiply base Potential Energy by 1.5 |
|3 or 7         |Multiply base Potential Energy by 2 |
|11           |Trauma: Roll another 12-sided die and apply result from the Critical, combat success effects extension table |

#### Critical, combat success effects extension table

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:————|:——|
|1        |Defender Difficulty Rating reduced by 2, recurring and compounding |
|2, 5, or 8  |Multiply base Potential Energy by 2, target defender. |
|3, 6, or 9  |Multiply base Potential Energy by 2.5, target defender. |
|4 or 7     |Reduce defender’s spirit battery by 1; use health battery if spirit battery is unavailable or at 0 |
|10       |Reduce defender’s health battery by 1, recurring and compounding |
|11       |Multiply base Potential Energy by 3, target defender. |
|12       |Defender can’t act for 2 rounds | 

Recurring means the effect is applied every round. Compounding means the effect can be applied multiple times. This simulates severe injury and allows for severe injury to occur multiple times.

For example, a Character (attacker) is fighting another Character (defender) with a Difficulty Rating of 6. The Player rolls a Critical, combat success that results in the Difficulty Rating being reduced by 2, becoming a Difficulty Rating of 4. Every following round, the defender’s Difficulty rating will be 4 (recurring). If the Player manages to roll the same Critical, combat success a second time, the defender’s Difficulty Rating becomes 2 for each following round (compounding). This could increase to the point where the defender’s Difficulty Rating becomes 0.

### Critical, combat failure

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:————|:——|
|Even number |Minus 1 from attacker Action target battery, or, any other non-health battery, if the Action target battery is at 0 |
|1, 5, or 9      |Minus 2 from attacker Action target battery, does not impact other Life Batteries, if Action target battery is at 0 |
|3 or 7         |Attacker damages self at one-to-one Scale, 0 resistance, base Potential Energy divided by 2 (round down); damage cannot be less than 1 |
|11           |Trauma: Roll another 12-sided die and apply result from the Critical, combat failure effects extension table |

#### Critical, combat failure effects extension table

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:————|:——|
|11        |Tool used is rendered useless for future rounds. If no tool is used, multiply base Potential Energy by 3 and target the attacker. |
|Other    |Apply Critical, combat success effects extension table replacing the word “defender” with “attacker” |

</details>

<details>
<summary>Partials and complications</summary>

This modification is designed to operate with the Criticality modification above, however, players MAY choose to use it as a standalone modification.

- Players MUST add an extra die to the Dice Pool, which is known as the Criticality die and SHOULD be distinct from the other dice in the pool; we RECOMMEND a 10-sided die, which represents a 10 percent chance of a partial or complication.
	- The die MAY be changed per session or per action.
- If the greatest number on the Criticality Die is rolled, the result is a partial or complication based on the success or failure of the rest of the Dice Pool.
	- A partial is a mildly positive effect on an otherwise failed action.
	- A complication is a mildly negative effect on an otherwise successful action.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool; Players SHOULD decide prior to becoming aware of the difficulty level assigned to the action.
	- Players MAY decide to always roll a Criticality Die as a group decision. We RECOMMEND the decision be made prior to the beginning of the session.

</details>

## Proficiency Ranks

- Proficiency Points MUST be applied to an Action Type or tool related to the action performed. (For example, using a knife to cut bread results in a proficiency point being earned. That point can be applied to a cooking Action Type, to the edged tool, or both, however, the Proficiency Point MUST NOT be applied to a spell casting Action Typed, if applicable.) We RECOMMEND:
	- 2 Proficiency Points earned on success and
	- 1 point earned on failure.
- Skill-trees SHOULD be determined by Players as Characters interact with the Setting and other Characters; reduces pre-setup and starts game play in the most open and freeform condition.
	- Skills may be sub-divided (forming a skill-tree); cooking in general versus a specific recipe.
		- It is left to Player discretion to determine parent-child relationships among skills.
		- At least two ranks in the parent SHOULD be earned before proficiency points are earned toward the child (more specialized skill). If a parent skill is created after ranks in the child have been earned, we RECOMMEND moving the achieved ranks to the parent proficiency and re-building ranks in the child proficiency. 
		- If mastery (three ranks) in the parent skill has been achieved, the Difficulty Rating of the action is automatically reduced by one; this reduction MUST only apply once regardless of skill-tree depth and use.
		- The hierarchy of the skill-tree SHOULD be limited to three levels or less.
- Tools SHOULD NOT be sub-divided.

## Life Batteries

- Each Character has 1 battery named, health, with a maximum value of 8.
- Characters are considered dead when their health battery reaches 0.
- Characters may recharge their health battery by using items, resting, or seeking assistance from other Characters.
- Recharging activities MAY have a Difficulty Rating applied.
	- Players MAY recharge the health battery multiple ways including resting, napping, and sleeping.

### Life Batteries: Official Additions
 
<details>
<summary>Standard four battery implementation</summary>

- Extends the vanilla implementation.
- Characters have 3 additional batteries: physical, mental, and spirit.
- For a Character to be considered dead, all batteries should be at 0; none of the batteries can be negative.
- Each action SHOULD target one non-health battery.
	- Injury and healing actions SHOULD affect the health battery.
	- Physical tasks SHOULD predominately affect the physical battery.
	- Mentally taxing activities SHOULD predominately impact the mental battery.
	- Magic and similar actions SHOULD predominately impact the spirit battery.
	- *Note: The overflow recharging (see below) facilitates the notion that actions are rarely strictly physical, mental, or spiritual and is RECOMMENDED.*
- Player-initiated recharging activities SHOULD include the following, with the associated batteries and points per unit of time and MUST increase each battery at least one point per unit of time.
	- Rest (slow): Health battery, 2 points.
	- Nap (fast): Physical battery, 3 points.
	- Sleep (fastest): Physical battery, 4 points.
	- Meditate (fast): Mental battery, 3 points.
	- Pray (fast): Spirit battery, 3 points.
	- *Note: Slow, fast, and fastest speaks to the length of player time compared to character time required to recharge all batteries as if they were at, or near, 0.*
- Players MAY spend non-health battery points to reduce the Difficulty Rating of an action; 1 Difficulty Rating per battery point.
	- The battery points spent MUST come from the battery being target by the action.

</details>

*Note: We make some presumptions about the setup used in conjunction with these additions, which MAY be modified to meet your needs.*

<details>
<summary>Overflow recharging</summary>

- Batteries MAY be used to recharge other batteries.
	- Health MUST NOT be used to recharge any of the other batteries.
	- It takes 2 points from any combination of batteries to recharge 1 point to the other non-health batteries. (For example, 2 point from spirit can be used to recharge 1 point to physical; or, 1 point from spirit and 1 point from mental can be used to recharge 1 point to physical.)
	- It takes 3 points from any combination of batteries to recharge 1 point to the health battery. (For example, 2 points from spirit and 1 point from physical can be used to recharge 1 point to health.)

</details>

<details>
<summary>Assisting other Characters</summary>

When assisting other Characters using this modification, one Character transfers one or more of their battery points to the Character performing a given action. The Difficulty Rating here is applied to the action of assisting itself for the assisting character.

- The transfer MUST be from the same battery the point will be transferred to.
- Players MAY transfer battery points from a Character they control to another Character in the Setting; the baseline Difficulty Rating is based on distance between Characters:
	- Touch: Difficulty 0.
	- Distance (usually line of sight): Difficulty 1.
	- Ranged (MAY be out of sight): Difficulty 2.
- Players MAY increase the Difficulty Rating after starting with the baseline.
- The Difficulty Rating to assist SHOULD be less than the initial Difficult Rating of the action being performed by the other Character.
- Assisting SHOULD NOT require movement by the assisting character.

</details>

<details>
<summary>Death, resurrection, and reincarnation</summary>

- If a Character dies, 1 proficiency point SHOULD be removed from all completed Proficiency Ranks. This represents relearning or recovering skills, however, maintaining some memory of the skill.
- If a Character is resurrected, the health battery MUST be set to 1; all other batteries MUST be set to 0.
	- The Character is the same character and MAY retain possessions.
	- *Note: The Character has to have died first, therefore, the impact of death applies.*
- If a Character is reincarnated they are considered to have died and been resurrected, therefore, the impacts of those two situations apply along with:
	- 1 point being removed from all partially acquired Proficiency Ranks.
	- The Character loses all physical possessions they had at the time of death.
	- The Character, if maintained as the actual same Character, will appear in their hometown (place of birth) or place of residence.

</details>
