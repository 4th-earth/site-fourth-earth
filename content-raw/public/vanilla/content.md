# 4th Earth RAW: Vanilla

[Version](/versioning/): 0.1.1

<nav id="toc" role="region" aria-live="polite" data-open="false">
<button id="toc-toggle" aria-expanded="false" aria-controls="toc" onclick="toggleTOC()"><span>open</span> <abbr title="table of contents">TOC</abbr></button>

- [Difficulty Rating](#difficulty-rating)
	- [Real-time action resolution](#real-time-action-resolution)
	- [Opposing character interactions](#opposing-character-interactions)
- [Dice Pools](#dice-pools)
- [Proficiency Ranks](#proficiency-ranks)
- [Life Batteries](#life-batteries)
- [Characters](#characters)
- [Social contract](#social-contract)
- [Glossary](#glossary)

</nav>

4th Earth [.rules as written](RAW): Vanilla is designed to provide a minimal setup for Players to create Characters and stories in the spirit of [4th Earth RAW](/).

If you want to expand these mechanics and aren't sure where to start, we RECOMMEND looking at the official add-on implementations known as [Sprinkles](/sprinkles/).

The vanilla implementation is designed to facilitate solo-adventuring. However, the vanilla implementation MAY be used with groups, with or without a Narrator acting as facilitator and increasing story dynamism.

## Difficulty Rating

- The health Life Battery MUST NOT be used to reduce the Difficulty Rating.
- If using non-health Life Batteries:
    - Difficulty MAY be reduced by spending [Life Battery](#life-batteries) points; 1 Difficulty Rating for each Target Action Battery point spent.
    - Difficulty Ratings SHOULD target one non-health battery. For example:
	    - Injury and healing Actions SHOULD affect the health Battery.
	    - Physical Actions SHOULD predominately affect the physical Battery.
	    - Mentally taxing Actions SHOULD predominately affect the mental Battery.
	    - Magic and similar actions SHOULD predominately affect the spiritual Battery.
- Difficulty MAY be increased or decreased by negotiating with the Narrator, if applicable.

### Real-time action resolution 

- All Characters MUST decide what they will attempt to do.
- All Actions MUST be given a Difficulty Rating.
- All Players MUST modify the Difficulty Rating, build their Dice Pools, and roll at the same time.
- Character Actions SHOULD be narratively resolved starting with the Dice Pools containing the most ones.
    - Ties between Antagonist and Protagonist Characters SHOULD go to the Character with more dice in their Dice Pool.
- Character Actions MAY be negated as a result of Action resolution.

### Opposing Character Interactions

The following apply to Character Actions where the target of the Action is another Character who is contesting the Action; if the Action isn’t contested, the Difficulty Rating MUST be 0.

- There MUST be a Protagonist and an Antagonist; the Protagonist Player Rolls the Dice Pool.
- If the Antagonist is subdued, the Difficulty Rating MUST be 0.
    - The Initial Difficulty Rating, unless subdued, SHOULD BE at least the number of Proficiency Ranks the Antagonist has in the same Action Types and Tools used by the Protagonist; including parent Action Types.
- For physically aggressive Actions:
	- Difficulty Rating MUST represent difficulty to hit the Antagonist; this includes grappling, holding, or restraining the Antagonist.
	- Difficulty Rating SHOULD be calculated using the Antagonist Difficulty Rating below.
	- Damage SHOULD be calculated using the Protagonist Potential Energy below.
	- Grappling, holding, or restraining MUST NOT cause damage to the Antagonist.
		- If the Antagonist is restrained in some way, attempting to escape MUST result in the Antagonist becoming the Protagonist; SHOULD happen on the Antagonist’s turn, if using turn-based gameplay.
- The Initial Difficulty Rating MAY be reduced by 1, if performing an Action using a specialty and having mastered the parent Action Type (three ranks).

#### Antagonist Difficulty Rating

The following describes a method for calculating the Difficulty Rating of an Antagonist.

- Start from the Initial Difficulty Rating defined above.
- If the Antagonist views the Protagonist's Action as aggressive and the Antagonist is aware of the aggressive action, the Difficulty Rating MUST be increased by 1.

#### Protagonist Potential Energy

The following table describes a method for calculating the Potential Energy (damage) of an attack, which determines how many health Battery Points will be lost, if the attack is successful.

- Physical damage MUST target the health Life Battery.
- Verbal, advanced technology, or magic attacks MAY impact non-health Life Batteries and SHOULD be a known quality or attribute of the Action Type, Tool, or spell.
- Slow Actions MUST be limited to once per Turn or Round.
- Fast Actions MAY be performed twice by the Protagonist in a Turn or Round.
	- If the Fast Action is performed twice, the Difficulty Rating MUST be divided by 2 and split evenly between the two Actions; if performing once, the Difficulty Rating MUST NOT be split.
		- If the Fast Action is performed twice and the Difficulty Rating is odd, the Player MUST round up the first and round down the second Difficulty Rating.
		- If using non-health Life Batteries, Players MAY spend non-health Life Battery Points to reduce the Difficulty Ratings individually; as if they were two, separate Actions.
- Potential Energy MAY be reduced mechanically (see [Resistance Sprinkle](https://raw.4th.earth/sprinkles/#resistance)), or, through negotiation and narrative convenience (incapacitate instead of kill, for example).

<div is="table">

|Action                       |Speed |Potential Energy                                     |
|:----------------------------|:----:|:----------------------------------------------------|
|Jab                          |Fast  |1 per Fast Action taken and successful; maximum of 2 |
|Uppercut, kick, ram, or slam |Slow  |2                                                    |
|Dual (same tool each hand)   |Fast  |2 per Fast Action taken with the tool; maximum of 4  |
|Two-handed                   |Slow  |3                                                    |
|Advanced technology or magic |Slow  |5                                                    |

</div>

## Dice Pools

See Sprinkles.

## Proficiency Ranks

- Proficiency Points MUST be applied to an Action Type, Specialty, or Tool related to the Action performed. (For example, using a knife to cut bread results in a Proficiency Point being earned. That point can be applied to a cooking Action Type, to the edged Tool, or both, however, the Proficiency Point MUST NOT be applied to a spell casting Action Type, if applicable.) We RECOMMEND:
	- 2 Proficiency Points earned on success,
	- 1 point earned on failure, and
	- 0 points earned for Actions with Difficulty Rating of 0; even if the Initial Difficulty Rating was greater than 0.
- Action Types and Specialties SHOULD be determined by Players as Characters interact with the Setting and other Characters; reduces pre-setup and starts game play in the most open and freeform condition.
	- Action Types SHOULD represent a general proficiency and the child SHOULD represent a Specialty.
	- The specialty SHOULD be a specific Action Type, not a combination. (For example, a preparing food Action Type MAY have a Specialty of baking. Further, a master of unarmed combat MAY have a Specialty in a jab but not in kung fu.)
	- Each Action Type MAY have one or more Specialties; however, Specialties MUST NOT have deeper Specialities.
	- Players MAY determine parent-child relationships among Action Types and Specialties.
	- The Action Type MUST be mastered before Proficiency Points are earned toward a  Specialty.
		- If an Action Type is later determined to be a Specialty, we RECOMMEND moving the achieved Proficiency Points and Ranks to the parent Action Type and re-building ranks in the Specialty.
	- Characters MAY have different Action Types and Specialties, however, similar Actions performed by different Characters SHOULD use the same named Action Type and Specialty to minimize complexity. *Note: Naming things is hard.*
- Tools SHOULD NOT be tiered.

## Life Batteries

- Each Battery MUST have 8 Battery Points.
- Each Character MUST have at least 1 Battery named, health.
	- We RECOMMEND 3 additional non-health Batteries named, physical, mental, and spiritual.
- Characters SHOULD be considered deceased (or incapacitated) when their health Battery reaches 0.
	- If using non-health Batteries, Characters SHOULD be considered deceased (or incapacitated) when all Life Batteries are at 0.
- Characters may recharge their health Battery by using items, resting, or transferring Battery Points as described below.
	- If using non-health Batteries, any Character-initiated recharging Action SHOULD recharge all Batteries, including health, at least 1 point per unit of Character Time. We RECOMMEND the following recharging Actions and primary Batteries affected per unit of Character Time:
	   - Rest (short): Health Battery, 2 points.
	   - Nap (medium): Physical Battery, 3 points.
	   - Sleep (long): Physical Battery, 4 points.
	   - Meditate (short): Mental Battery, 3 points.
	   - Pray (short): Spirit Battery, 3 points.
- Recharging Actions MAY have a Difficulty Rating.
- Life Batteries MAY be used to recharge other Batteries.
	- The health battery MUST NOT be used to recharge any other Life Batteries.
	- To recharge 1 Battery Point to the health Battery, Players MUST spend Battery Points equal to the number of non-health Life Batteries to recharge 1 point to the health Battery. (For example, 3 non-health batteries means 2 points from spiritual and 1 point from physical MAY recharge 1 point to health.)
    - To recharge 1 Battery Point to a non-health Battery, Players MUST spend Battery Points equal to the number of non-health Batteries minus 1 (the target). (For example, if there are 3 non-health Life Batteries, 2 points from spiritual MAY recharge 1 point to physical; or, 1 point from spiritual and 1 point from mental MAY recharge 1 point to physical.)

## Characters

[Vanilla Character Sheet](/vanilla/character-sheet.pdf)

## Social contract

[Vanilla Socail Contract](/vanilla/social-contract.pdf)

## Glossary

Antagonist
:    The Character impacted by a contested Action of another Character.

Specialty
:    A refined Action Type, which has a more generic parent Action Type; does not apply to Tools.
:    All Specialties are Action Types, but not all Action Types are Specialties.

Protagonist
:    The Character performing an Action in a contested Action.

Target Action Battery
:    The Life Battery targeted by an Action.

Target Action Battery Point
:    The Battery Points for a Target Action Battery.
