# Change Log (change-log)
An index and topic collection covering developer changelog publishing, release-notes platforms, and API change-tracking services. Change Log services help product, engineering, and developer-relations teams communicate releases, deprecations, and breaking changes to customers and integrators through structured changelog feeds, in-app widgets, and machine-readable diffs. This collection includes dedicated changelog publishing platforms like LaunchNotes, AnnounceKit, Beamer, and Canny, API specification diffing tools like oasdiff and Optic, and the broader ecosystem of API management and product-update platforms that expose changelog feeds, release notes, and version-tracking capabilities.

**URL:** [https://apievangelist.com](https://apievangelist.com)

## Tags:

 - Changelog, Release Notes, API Versioning, Product Updates, Spec Diff, Deprecation

## Timestamps

- **Created:** 2026-05-19
- **Modified:** 2026-05-19

## Common Properties

- [Portal](https://apievangelist.com)
- [GitHubOrganization](https://github.com/api-evangelist)
- [JSONSchema - Changelog Entry Schema](https://raw.githubusercontent.com/api-evangelist/change-log/refs/heads/main/json-schema/change-log-changelog-entry-schema.json)
- [JSONSchema - API Change Schema](https://raw.githubusercontent.com/api-evangelist/change-log/refs/heads/main/json-schema/change-log-api-change-schema.json)
- [JSON-LD](https://raw.githubusercontent.com/api-evangelist/change-log/refs/heads/main/json-ld/change-log-context.jsonld)
- [Vocabulary](https://raw.githubusercontent.com/api-evangelist/change-log/refs/heads/main/vocabulary/change-log-vocabulary.yaml)

## Features

| Name | Description |
|------|-------------|
| Customer-Facing Changelog Publishing | Dedicated platforms like LaunchNotes, AnnounceKit, and Beamer give product and developer-relations teams structured workflows to publish customer-facing changelog entries, release notes, and deprecation notices. |
| In-App Release Widgets | Tools like Beamer, Chameleon, and Userpilot embed changelog widgets and what-is-new notifications directly inside applications so users discover updates in context. |
| API Specification Diffing | Spec-diff tools like oasdiff and Optic compare OpenAPI definitions across versions to detect breaking and non-breaking changes, generate structured changelogs, and gate releases in CI. |
| Release Notes Feeds and Webhooks | Most changelog platforms expose RSS, Atom, JSON, or webhook feeds of release entries so other systems can react to releases programmatically. |
| Roadmap and Feedback Integration | Platforms like Canny, Productboard, and Aha tie changelog entries back to feedback, requests, and roadmap items so customers see the full lifecycle from idea to ship. |
| API Versioning and Deprecation Tracking | API management platforms like Kong, Tyk, Apigee, and Bump.sh track API versions and surface deprecations through documentation portals and machine-readable feeds. |
| Changelog Templates and Conventions | Conventions like Keep a Changelog provide a stable Markdown structure (Added, Changed, Deprecated, Removed, Fixed, Security) widely adopted across open source and enterprise projects. |
| Multi-Channel Release Communication | Modern changelog platforms distribute the same release entry to email, in-app widgets, RSS, Slack, and developer portals, ensuring every audience sees the update through their preferred channel. |

## Use Cases

| Name | Description |
|------|-------------|
| Public API Changelog Publishing | API providers publish customer-facing changelogs of new endpoints, breaking changes, and deprecations on platforms like LaunchNotes or Bump.sh. |
| Automated Breaking-Change Detection | Engineering teams run oasdiff or Optic in CI to detect breaking changes between OpenAPI versions and block merges that would silently break consumers. |
| In-App Product Update Announcements | Product teams use Beamer, AnnounceKit, or Chameleon to show in-app changelog widgets that notify end users of new features without leaving the application. |
| Customer Feedback to Release Loop | Teams use Canny or Productboard to collect feedback, prioritize features, and then announce shipped work back to the same customers via a connected changelog. |
| Developer Portal Release Notes | API management platforms like Apigee, Kong, and SwaggerHub publish release notes alongside API documentation so developer portals stay current with each version. |
| Open Source Release Documentation | Open source projects follow the Keep a Changelog convention and pair it with GitHub or GitLab releases to publish human-readable changelogs alongside semantic version tags. |
| Deprecation Lifecycle Communication | API teams use changelog platforms to announce upcoming deprecations, surface them through Deprecation HTTP headers, and track adoption of newer versions. |
| Customer-Facing Status and Release Notes | Incident and status platforms like Statuspage combine system status with release notes so customers see both reliability and feature updates in one place. |

## Integrations

| Name | Description |
|------|-------------|
| LaunchNotes | Release communication platform for sharing changelogs, roadmaps, and deprecation notices with structured publishing workflows and a public API. |
| AnnounceKit | Changelog and release-notes platform with in-app widgets, email distribution, and segmented announcements for SaaS products. |
| Beamer | In-app changelog and announcement platform that delivers what-is-new notifications, feedback collection, and NPS surveys via embedded widgets. |
| Canny | Feedback management platform with a built-in changelog that closes the loop between user requests and shipped releases. |
| Oasdiff | Open-source CLI that diffs OpenAPI specifications, detects breaking changes, and emits structured changelogs for CI pipelines. |
| Optic | API change-management platform that captures API behavior, diffs OpenAPI specs, and produces governance-friendly changelogs. |
| Bump.sh | API documentation and change-tracking platform that publishes versioned API docs and diff-based changelogs from OpenAPI and AsyncAPI specs. |
| Linear | Issue tracker with a built-in changelog feature that publishes completed work to public release pages. |

## Artifacts

Machine-readable API specifications organized by format.

### JSON Schema

- [Changelog Entry Schema](json-schema/change-log-changelog-entry-schema.json)
- [API Change Schema](json-schema/change-log-api-change-schema.json)

### JSON Structure

- [Changelog Entry Structure](json-structure/change-log-changelog-entry-structure.json)
- [API Change Structure](json-structure/change-log-api-change-structure.json)

### JSON-LD

- [Change Log Context](json-ld/change-log-context.jsonld)

## Vocabulary

- [Change Log Vocabulary](vocabulary/change-log-vocabulary.yaml) — Unified taxonomy mapping resources, actions, workflows, and personas across changelog publishing platforms, API spec-diff tools, and release-communication services

## Network

This index references the following changelog publishing, release-notes, and API change-tracking repositories:

- [Aha.io](https://github.com/api-evangelist/aha)
- [AnnounceKit](https://github.com/api-evangelist/announcekit)
- [Apicurio](https://github.com/api-evangelist/apicurio)
- [Apigee](https://github.com/api-evangelist/apigee)
- [APIMatic](https://github.com/api-evangelist/apimatic)
- [APIwiz](https://github.com/api-evangelist/apiwiz)
- [Axway](https://github.com/api-evangelist/axway)
- [Beamer](https://github.com/api-evangelist/beamer)
- [Bump.sh](https://github.com/api-evangelist/bump-sh)
- [Canny](https://github.com/api-evangelist/canny)
- [CHANGELOG.md](https://github.com/api-evangelist/changelog-md)
- [Chameleon](https://github.com/api-evangelist/chameleon)
- [GitHub](https://github.com/api-evangelist/github)
- [GitLab](https://github.com/api-evangelist/gitlab)
- [Kong](https://github.com/api-evangelist/kong)
- [LaunchNotes](https://github.com/api-evangelist/launchnotes)
- [Linear](https://github.com/api-evangelist/linear)
- [Loops](https://github.com/api-evangelist/loops)
- [Notion](https://github.com/api-evangelist/notion)
- [Oasdiff](https://github.com/api-evangelist/oasdiff)
- [Optic](https://github.com/api-evangelist/optic)
- [Postman](https://github.com/api-evangelist/postman)
- [Productboard](https://github.com/api-evangelist/productboard)
- [Redocly](https://github.com/api-evangelist/redocly)
- [Statuspage](https://github.com/api-evangelist/statuspage)
- [Stoplight](https://github.com/api-evangelist/stoplight)
- [SwaggerHub](https://github.com/api-evangelist/swaggerhub)
- [Tyk](https://github.com/api-evangelist/tyk)
- [Userback](https://github.com/api-evangelist/userback)
- [Userpilot](https://github.com/api-evangelist/userpilot)
- [WSO2](https://github.com/api-evangelist/wso2)

## Maintainers

**FN:** Kin Lane

**Email:** kin@apievangelist.com
