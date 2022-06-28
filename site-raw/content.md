# 4th Earth: Rules as Written

These are the rules as written for 4th Earth [.rules as written](RAW) a framework for creating [.table-top role playing games](TTRPGs). 

4th Earth is designed for collaborative storytelling (and home brewing) from the mundane, theatre of the absurd, to the fanciful and super-heroic. Whether you're solo-adventuring or in a group, 4th Earth gives you a set of simple mechanics to keep the mystery and unknown alive.

Players personify one or more Characters who interact with the Setting and other Characters. Those interactions are given a [Difficulty Rating](#difficulty-rating). The Difficulty Rating and Proficiency Ranks are used to create a Dice Pool, which is rolled to resolve the interaction and determine if it was successful or not. Life Batteries are used to determine the life and health of the Character and MAY be used to adjust the Difficulty Rating of an interaction.

4th Earth is created with following values in mind:

1. **Additive over reductive.** Players should be able to start from a simple foundation and add to it, instead of starting from an "everything and the kitchen sink" place and reducing.
2. **Narrative over simulation.** Players should be able to focus on creating engaging stories without strictly replicating reality.
3. **Flow over grinding.** Players should be able to get lost in their story and actions without performing repetitive tasks.
4. **Power ceilings over threat escalation.** Saved the town, saved the country, saved the world, saved the universe, what next?
5. **Progressive disclosure over saturation.** Players should be able to start playing having never read the rules or specification and learn as they go.

4th Earth RAW uses the key words described in [Key words for use in RFCs to Indicate Requirement Levels](https://datatracker.ietf.org/doc/html/rfc2119):

- MUST, REQUIRED, or SHALL;
- MUST NOT or SHALL NOT;
- SHOULD or RECOMMENDED;
- SHOULD NOT or NOT RECOMMENDED; and
- MAY or OPTIONAL.

Players personify Characters who interact with the Setting and other Characters. Interactions:

- MUST be assigned a Difficulty Rating,
- MAY target a non-health Life Battery, if applicable.

The Player for the Character MAY create a Dice Pool based on the Difficulty Rating, where the number of dice in the pool MAY be less than equal to the number of applicable Proficiency Ranks available to the Character.

## Difficulty Rating

The Difficulty Rating is the keystone mechanic for Characters to interact with the Setting and other Characters.

Character actions consist of the following, minimal, list of activities:

1. Character intent; the Player describes what the Character will attempt to do.
2. The intent is assigned an initial [Difficulty Rating](#difficulty-rating).
3. The Player (and Narrator, if applicable) MAY negotiate the Difficulty Rating up or down.
4. The Player creates a Dice Pool based on the agreed upon Difficulty Rating and rolls the Dice Pool, if applicable.

Actions are resolved by answering the following questions:

- Was the action successful?
- How was the outside world affected by the action?

Difficulty is based on qualities of the opposing force for the given intent. 

- Difficulty 0 MUST represent automatic success.
- Difficulty Infinite MUST be impossible for the Character to achieve in the Setting.
- Difficulty SHOULD be based on the Character attempting the interaction (standing up may be difficulty 6 for an infant and difficulty 0 for an adult).
- Players SHOULD be able to influence the Difficulty in one or more ways.

<details>
<summary>Vanilla implementation</summary>

- Difficulty MAY be reduced by spending Life Battery points.
- Difficulty MAY be increased or decreased by negotiating with the Narrator, if applicable.

</details>

### Difficulty Rating Table

|Level   |Sides            |Human-friendly             |Opposing value |
|:-----:|:-----------:|:----------------------|:------------:|
|0        |0                |Done!                        |Infinite          |
|1        |2                |Safe bet                     |7                 |
|2        |4                |Simple                        |6                |
|3        |6                |Difficult                      |5                |
|4        |8                |Long shot                    |4                |
|5        |10               |Leap of faith                |3                |
|6        |12               |Inconceivable                |2                |
|7        |No dice!        |Impossible, if not reduced |1                |
|Infinite |non-applicable |Impossible                    |0                |

## Dice pools

Dice Pools are a collection of dice. The sides of the dice to use is determined by the [Difficulty Rating](#difficulty-rating-table) of the intended action. The number of dice in the pool is determined by the number of [Proficiency Ranks](#proficiency-ranks) being applied to the action.

Dice Pools:

- MUST have at least 1 die regardless of [Difficulty Rating](#difficulty-rating) or [Proficiency Ranks](#proficiency-ranks); referred to as the base die.
- Rolling 1 on a single die in the Dice Pool MUST represent successful completion of the action.
- SHOULD NOT exceed 5 dice, which keeps the pool manageable and allows room for additional dice to facilitate things like critical success, failure, or both.

<details>
<summary>Vanilla implementation</summary>

The vanilla implementation is designed to facilitate solo-adventuring and minimize the number of Players rolling at any given time. In short, Players do not roll against one another and Difficulty Ratings are assigned or derived; even for combat. Instead, each Character is given an opportunity to succeed or fail at their desired action.  

</details> 

### Official Modifications: Dice Pools

<details>
<summary>Re-roll implementation</summary>

- Players MAY spend battery and proficiency points to re-roll and action. (The health battery cannot be used.)
- Players MAY spend 2 points to re-roll the whole Dice Pool or 1 point to re-roll a single die in the pool.
- As long at the Character has points remaining, the Player MAY continue spending points.

</details>
















## Proficiency Ranks

Proficiency Ranks represent the level or proficiency a Character has performing a skill or using a tool.

- Each rank SHOULD require earning two or more proficiency points toward the rank. 
- Each rank SHOULD be achievable in roughly four attempts.
- Each rank MAY increase the number of dice in the Dice Pool.
- Using a tool MAY reduce the Difficulty rating of an action up to 2 levels.
- The implementation SHOULD be stable for the entire session. 
	- The implementation MAY be adjusted from session to session. 
	- These adjustments SHOULD be minimal from one session to the next.
- Skills SHOULD have more possible ranks than tools. We RECOMMEND:
	- 3 ranks per skill.
	- 1 rank per tool; general, not specific (a knife is a knife).
	- 4 proficiency points per rank.
- Proficiency points MUST be applied to a skill or tool related to the action performed. (For example, using a knife to cut bread results in a proficiency point being earned. That point can be applied to the cooking skill, use of the edged tool, or both, however, the proficiency point MUST NOT be applied to a skill in casting a spell, if applicable.) We RECOMMEND:
	- 2 proficiency points earned on success and
	- 1 point earned on failure and
	- MAY be distributed any way the Player deems suitable.

<details>
<summary>Vanilla implementation</summary>

- Skill-trees SHOULD be determined by Players as Characters interact with the Setting and other Characters; reduces pre-setup and starts game play in the most open and freeform condition.
	- Skills may be sub-divided (forming a skill-tree); cooking in general versus a specific recipe.
		- It is left to Player discretion to determine parent-child relationships among skills.
		- At least two ranks in the parent SHOULD be earned before proficiency points are earned toward the child (more specialized skill). If a parent is created after ranks in the child have been earned, we RECOMMEND moving the achieved ranks to the parent proficiency. 
		- If mastery (three ranks) in the parent skill has been achieved, the Difficulty Rating of the action is automatically reduced by one; this reduction MUST only apply once.
		- The hierarchy of the skill-tree SHOULD be limited to three levels or less.

</details>

## Life Batteries

Life batteries represent the life force of a Character. 

Batteries:

- MUST have multiple ways to recharge. 
	- Some recharging methods SHOULD be player initiated (sleep, for example).
	- SHOULD favor a "both ways" approach; if batteries can recharge multiple ways, they SHOULD be able to drain multiple ways (starvation, for example).
- SHOULD be kept to a minimum to reduce administrative overhead and maintain tension.
- SHOULD have the same maximum number of battery points; for each battery.
- SHOULD be the same for all Characters (even non-player characters) in a Setting with the same rules applied.
- MAY be created before play begins or created as the story progresses (Players may decide a stealth battery is appropriate while playing).
- MAY be used to resolve actions.

<details>
<summary>Vanilla implementation</summary>

- Each Character has 1 battery, called health, with a maximum value of 8.
- Characters are considered dead when their health battery reaches 0.
- Characters may recharge their health battery by using items, resting, or seeking assistance from other Characters.
- Recharging activities MAY have a Difficulty Rating applied.
	- Players MAY recharge the health battery multiple ways including resting, napping, and sleeping.

</details>

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
	- *Note: The ability to recharge a battery by pulling points from a different battery facilitates the notion that actions are rarely strictly physical, mental, or spiritual.*
- Player-initiated recharging activities SHOULD include the following, with the associated batteries and points per unit of time.
	- The following recharging activities MUST recharge each battery by one point and the target battery by the points specified.
	- Rest (slow): Health battery, 2 points.
	- Nap (fast): Physical battery, 3 points.
	- Sleep (fastest): Physical battery, 4 points.
	- Meditate (fast): Mental battery, 3 points.
	- Pray (fast): Spirit battery, 3 points.
	- *Note: Slow, fast, and fastest speaks to the length of game time required to recharge all batteries as if they we at, or near, 0.*
- Players MAY spend battery points to reduce the Difficulty Rating of an action; 1 Difficulty Rating per battery points point.
	- The battery points spent MUST come from the battery being target by the action.

</details>

### Official modifications

The following are classified as one-off rulesets related to specific situations, which Players MAY choose to incorporate into their game-play piecemeal.

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

When assisting other Characters using this modification, one Character transfers one or more of their battery points to the Character performing a given action. The Difficulty Rating here is applied to the assisting itself.

- The transfer MUST be from the same battery the point will be transferred to.
- Players MAY transfer battery points from a Character they control to another Character in the Setting; the baseline Difficulty Rating is based on distance between Characters:
	- Touch: Difficulty of 0.
	- Distance (usually line of sight): Difficulty of 1.
	- Ranged (MAY be out of sight): Difficulty of 2.
- Players MAY increase the Difficulty Rating after starting with the baseline.
- The Difficulty Rating to assist SHOULD be less than the initial Difficult Rating of the action being performed.
- Assisting SHOULD NOT require movement by the assisting character.

</details>

<details>
<summary>Death, resurrection, and reincarnation</summary>

- If a Character dies, 1 proficiency point SHOULD be removed from all completed Proficiency Ranks. This represents relearning or recovering skills, however, maintaining some memory of the skill.
- If a Character is resurrection the health battery MUST be set to 1; all other batteries MUST be set to 0.
	- The Character is the same character and MAY retain possessions.
	- *Note: The Character has to have died first, therefore, the impact of death applies.*
- If a Character is reincarnated they are considered to have died and been resurrected, therefore, the impacts of those two situations apply along with:
	- 1 point being removed from all partially acquired Proficiency Ranks.
	- The Character loses all physical possessions they had at the time of death.
	- The Character, if maintained as the actual same Character, will appear in their hometown (place of birth) or place of residence.

</details>

## Characters

Characters are anything within a [Setting](#setting) that can be personified by a Player.

- MUST be part of one or more more general identities.
- MUST have one or more [Life Batteries](#life-batteries).
- SHOULD be played by the same Player with every appearance unless otherwise agreed to in the Player Pacts.
- SHOULD favor nurture over nature for Proficiencies.
- SHOULD have a unique name to distinguish characters form one another.

Examples:

1. Teenage, male, human, cleric with a health battery with a maximum value of 10. Grew up in a monastery where he learned healing spells.
2. Adult, female, goddess, warrior with health, physical, mental, and aura batteries with a maximum value of 8 each. Grew up in a military family and has been training since she was old enough to walk.
3. Elderly, female, dog with a health battery with a maximum value of 6.

## Setting

4th Earth RAW is a game engine and does not require a specific setting. Further, you can use 4th Earth RAW in the setting of other games.

- MUST be agreed to by *all* players (including the narrator).
- MUST be enough to give flavor and direction; could be a single sentence or tome.
- MUST describe where, when, what, and general theme.
- MAY be developed by the players, a narrator, the outside world, or anything else.
- MAY include a specific, short-term plot (adventures and one-shots). 
	- MAY be a generic, long-term campaign. MAY be a world open for exploration with not agenda beyond exploration. Or, a combination.

Examples:

1. Jungle, 1955, Vietnam, hospital camp, filled with ordinary people, using technology appropriate to the time; mainly for healing (a serial war story).
2. Greek mythos, The Underworld during the 12th labor of Hercules involving deities and demigods (a one-shot mythology hero quest).
3. Early 21st century, Pluto, single-cell organisms (an evolution serial).

The last example includes a baseline description of the characters that can be played during the serialized adventure.

## Interacting with the Setting and Characters




### Official modifications

The following modifications are official implementations for concepts related to the Dice Pool.

<details>
<summary>Criticality</summary>

Criticality represents wild success *and* failure for mundane and combat actions. 

- Players MUST add an extra die to the Dice Pool, which is known as the Criticality Die and should be distinct from the other dice in the pool; we RECOMMEND a 10-sided die, which represents a 10 percent chance of criticality.
	- The die MAY be changed per session or per action.
- If a 1 is rolled on the Criticality Die, the result is a critical success or failure based on the success or failure of the rest of the Dice Pool.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool; Players SHOULD decide prior to becoming aware of the difficulty level assigned to the action.
	- Players MAY decide to always roll a Criticality Die as a group decision.

Beyond the narrative implications and outcomes, Criticality comes with mechanical impacts on the Character.

#### Critical, mundane success

A critical success on a non-combat (mundane) action, results in the following changes to the battery targeted by the action. MUST NOT be the health battery.

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:------------|:------|
|Even number |Plus 1 |
|1, 5, 9      |Plus 2 |
|3, 7         |Plus 3 |
|11           |Plus 5 |

If the target battery becomes full, the Player MAY distribute the remaining points to other non-health batteries of their choosing.


#### Critical, mundane failure

Is the opposite of the Critical, mundane success. 

- MUST subtract the effect in the Critical, mundane success table.
- If the target battery reaches 0, the Player MUST spend the remaining points against other non-health batteries of their choosing.
	- If using the Overflow recharging modification, Players SHOULD NOT use that mechanic to resolve the reduction of a target battery that has reached 0 due to critical failure. 

#### Critical, combat success

This implementation presumes you are using the vanilla implementation of combat described above.

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:------------|:------|
|Even number |Plus 1 to attacker target action battery, or, any other non-health battery if the target action battery is full |
|1, 5, 9      |Multiply base potential energy by 1.5 |
|3, 7         |Multiply base potential energy by 2 |
|11           |Trauma: Roll another 12-sided die and apply result from the Critical, combat success effects extension table |

##### Critical, combat success effects extension table

This table presumes you are using the Standard four battery implementation.

|Die value    |Effect |
|:------------|:------|
|1        |Defender Difficulty rating reduced by 2, recurring and compounding |
|2, 5, 8  |Multiply base potential energy by 2 |
|3, 6, 9  |Multiply base potential energy by 2.5 |
|4, 7     |Reduce defender's spirit battery by 1; use health battery if spirit battery is not available or is at 0 |
|10       |Reduce defender's health battery by 1, recurring and compounding |
|11       |Multiply base potential energy by 3 |
|12       |Defender can't act for 2 rounds | 

Recurring means the effect is applied every round. Compounding means the effect can be applied multiple times. This simulates severe injury and allows for severe injury to occur multiple times.

For example, a Character (attacker) is fighting another Character (defender) with a Difficulty rating of 6. The Player rolls a Critical, combat success that results in the Difficulty rating being reduced by 2, becoming 4. Every following round, the defender's Difficulty rating will be 4. If the Player manages to roll the same Critical, combat success a second time, the defender's Difficulty rating would become 2 for each following round. This could increase to the point where the defender's Difficulty rating becomes 0.

#### Critical, combat failure

The Player rolls one, 12-sided die.

|Die value    |Effect |
|:------------|:------|
|Even number |Minus 1 from attacker target action battery, or, any other non-health battery if the target action battery is at 0 |
|1, 5, 9      |Minus 2 from attacker target action battery, does not impact other batteries, if target action battery is at 0 |
|3, 7         |Attacker damages self at one-to-one Scale, 0 resistance, base potential energy divided by 2 (round down); damage cannot be less than 1 |
|11           |Trauma: Roll another 12-sided die and apply result from the Critical, combat failure effects extension table |

##### Critical, combat failure effects extension table

|Die value    |Effect |
|:------------|:------|
|11        |Tool used is rendered useless for future rounds. If no tool is used, multiply base potential energy by 3 and target attacker |
|Other.    |Apply Critical, combat success effects extension table replacing the word "defender" with "attacker" |

</details>

<details>
<summary>Partials and complications</summary>

This modification is designed to operate with the Criticality modification above, however, players MAY choose to use it as a standalone modification.

- Players MUST add an extra die to the Dice Pool, which is known as the Criticality die and should be distinct from the other dice in the pool; we RECOMMEND a 10-sided die, which represents a 10 percent chance of a partial or complication.
	- The die MAY be changed per session or per action.
- If the greatest number on the Criticality Die is rolled, the result is a partial or complication based on the success or failure of the rest of the Dice Pool.
	- A partial is a mildly positive effect on an otherwise failed action.
	- A complication is a mildly negative effect on an otherwise successful action.
- Players MAY decide to opt-out or -in to using the Criticality Die prior to the creation of the Dice Pool; Players SHOULD decide prior to becoming aware of the difficulty level assigned to the action.
	- Players MAY decide to always roll a Criticality Die as a group decision.

</details>