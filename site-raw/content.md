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

## Difficulty rating

Difficulty is based on qualities of the opposing force for the given interaction. 

- Difficulty 0 MUST represent automatic success.
- Difficulty Infinite MUST be impossible for the Character to achieve in the Setting.
- Difficulty SHOULD be based on the Character attempting the interaction (standing up may be difficulty 6 for an infant and difficulty 0 for an adult).
- Players SHOULD be able to influence the difficulty in one or more ways.
- Rolling a single number on a single die in the Dice Pool SHOULD be considered success.
	- This single number MUST be present on all the dice available for a Dice Pool.
	- The single number SHOULD be consistent for the duration of the session and MAY change from session to session as agreed upon by the players.
	- Difficulty 1 SHOULD favor dice over coins where an even or odd number represent success and SHOULD include the single number.

<details>
<summary>Vanilla implementation</summary>

- Rolling 1 on at least one die in the Dice Pool means the actions was a success. 
- Difficulty can be reduced by spending Life Battery points.
- Difficulty can be increased or decreased by negotiating with the narrator, if applicable.
- Difficulty applies to probability to hit when [interacting with other Characters](#interacting-with-the-setting-and-characters) in a contested fashion; the actor rolls, not the target.

</details>

### Table

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

## Proficiency ranks

Skills and tools increase or decrease the probability of success for an interaction. 

For example, trying to cut bread with a banana may increase the Difficulty Rating, even if the resulting Dice Pool has five or more dice.

- Each rank SHOULD require earning two or more proficiency points toward the rank. 
- Each rank SHOULD be achievable in roughly four attempts.
- Each rank MAY increase the number of dice in the Dice Pool.
- The implementation SHOULD be stable for the entire session. 
	- The implementation MAY be adjusted from session to session. 
	- These adjustments SHOULD be minimal from one session to the next.

<details>
<summary>Vanilla implementation</summary>

- Proficiency points MUST be applied to something related to the action performed. (For example, using a knife to cut bread results in a proficiency point being earned. That point can be applied to the cooking skill, knife use, or both, however, cannot be applied to a skill in casting a spell, if applicable.)
- Skills SHOULD have more possible ranks than tools.
- Earning a proficiency point MAY increase more than one rank-able aspect of the Character.
	- The implementation for applying proficiency points SHOULD be consistent for the entire session.
	- The implementation for applying proficiency points MAY be adjusted session to session.
- Skill-trees are determined as Players [Interact with the Setting and Characters](#interacting-with-the-setting-and-characters) through their Characters, not beforehand; reduces pre-setup and starts game play in the most open and freeform condition.
	- Skills may be sub-divided (forming a skill tree); cooking in general versus a specific recipe.
		- It is left to play discretion to determine parent-child relationships among skills.
		- At least two ranks in the parent SHOULD be earned before proficiency points are earned toward the child (more specialized skill).
		- If mastery (three ranks) in the parent skill has been achieved, the Difficult Rating of the action is reduced by one.
		- The hierarchy of the skill tree SHOULD be limited to three levels or less.

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
- Batteries MAY be used to recharge other batteries.
	- Health MUST NOT be used to recharge any of the other batteries.
	- It takes 2 points from any combination of batteries to recharge 1 point to the other non-health batteries. (For example, 2 point from spirit can be used to recharge 1 point to physical; or, 1 point from spirit and 1 point from mental can be used to recharge 1 point to physical.)
	- It takes 3 points from any combination of batteries to recharge 1 point to the health battery. (For example, 2 points from spirit and 1 point from physical can be used to recharge 1 point to health.)
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

### Official additions

The following are classified as one-off rulesets related to specific situations, which Players MAY choose to incorporate into their game-play piecemeal.

*Note: We make some presumptions about the setup used in conjunction with these additions, which MAY be modified to meet your needs.*

<details>
<summary>Inter-character battery point transfer</summary>

- Players MAY transfer battery points from a Character they control to another Character in the Setting; Difficulty Rating is based on distance between Characters.
	- Touch: Difficulty of 0.
	- Distance (usually line of sight): Difficulty of 1.
	- Ranged (usually out of sight): Difficulty of 2.
	- The transfer MUST be from the same battery the point will be transferred to.
	- Players MAY increase the Difficulty Rating if transferring more than a single battery point at a time.

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

[Character](#characters) actions consist of the following, minimal, list of activities:

1. Character intent; the Player describes what they would like the character to attempt.
2. The intent is assigned a [Difficulty Rating](#difficulty-rating).
3. The Player (and Narrator) MAY negotiate the Difficulty Rating up or down.
4. The Player creates a Dice Pool based on the agreed upon Difficulty Rating and rolls the Dice Pool, if applicable.

Actions are resolved by answering the following questions:

- Was the action successful?
- How was the outside world effected by the action?

Dice Pools are a collection of dice. The sides of the dice to use is determined by the [Difficulty Rating](#table) of the intended action. The number of dice in the pool is determine by the number of [Proficiency Ranks](#proficiency-ranks) being applied to the action.

Dice Pools:

- MUST have at least 1 die regardless of [Proficiency Ranks](#proficiency-ranks); referred to as the base die.
- SHOULD NOT exceed 5 dice, which keeps the pool manageable and allows room for additional dice to facilitate things like critical success, failure, or both. 

<details>
<summary>No counter-roll implementation</summary>



</details>