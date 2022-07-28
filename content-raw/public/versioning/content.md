# Versioning

We RECOMMEND using semantic versioning as described below and described in the spirit of Semantic Versioning 2.0.0 described at: [https://semver.org/spec/v2.0.0.html](https://semver.org/spec/v2.0.0.html)

4th Earth RAW Specifications (represented by [4th Earth RAW](/raw/) and [4th Earth RAW: Vanilla](/vanilla/)) SHOULD be versioned as a collection of guidelines and guardrails. Individual mechanics (represented by the individual concepts in [4th Earth RAW: Sprinkles](/sprinkles/)) SHOULD be versioned separately.

1. A release MAY represent a single change or a collection of changes. For example, if you make multiple MAJOR changes, one or more MINOR changes, and a PATCH change, you MAY choose to only increment the MAJOR number by 1.
2. For zero-major releases, any changes that would result in incrementing the MAJOR version, the MINOR version MUST be incremented instead.
3. When a requirement in a specification or mechanic is made more restrictive, the MAJOR version number MUST be incremented by 1. When a new MUST requirement is introduced, the MAJOR version MUST be incremented by 1.
4. When a requirement in a specification is made less restrictive, the MINOR version MUST be incremented by 1. When a new SHOULD or MAY requirement is introduced, the MINOR version MUST be incremented by 1.
5. Any changes that do not substantially alter the specification or mechanic SHOULD result in the PATCH version number being incremented by 1; this MAY including correcting typos or clarifying language while maintaining the intent.
