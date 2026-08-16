<div align="center">

<h1>Sortable latest data</h1>

<p>
developed and maintained by
<a href="https://www.initmax.com"><img alt="initMAX" src="./.readme/logo/initmax-logo-framed.svg" height="22" valign="middle"></a>
and community
</p>

<p><strong>Sort Latest data by the VALUE, not just by host and name.</strong><br>
Zabbix's own page, with your filters and your subfilters, plus the one column it has never let you order by.</p>

<p>
<img src="./.readme/badge/zabbix.svg" alt="Zabbix 6.0-7.4">
<img src="./.readme/badge/version.svg" alt="version 2.0.0">
<img src="./.readme/badge/php.svg" alt="PHP 7.4+">
<img src="./.readme/badge/free.svg" alt="FREE AGPLv3">
<img src="./.readme/badge/gpg.svg" alt="GPG signed">
</p>

<p>
<a href="#what-it-does"><strong>What it does</strong></a> &nbsp;·&nbsp;
<a href="#what-it-looks-like"><strong>Screenshot</strong></a> &nbsp;·&nbsp;
<a href="#install"><strong>Install</strong></a> &nbsp;·&nbsp;
<a href="#requirements"><strong>Requirements</strong></a> &nbsp;·&nbsp;
<a href="https://portal.initmax.com"><strong>Portal</strong></a> &nbsp;·&nbsp;
<a href="https://www.initmax.com/wiki/sortable-latest-data/"><strong>Docs</strong></a>
</p>

<br>

<img src="./.readme/screen/01-overview.png" width="880" alt="The Latest data page sorted by Last value">

</div>

---

## What it does

Zabbix's **Latest data** lets you order by **Host** and by **Name**. It has never let you order by **Last value** - those live in history, not in the item table - so finding the fullest disk or the busiest interface means reading the whole page.

**Sortable latest data** adds a second Latest data page under *Monitoring* with **Last value** as a third sortable column. Click it and the table reorders, ascending then descending, exactly like every other list in Zabbix.

Everything else is Zabbix's own page: the same filter, the same saved filter tabs, the same subfilters, the same context menus, the same graphs. The module does not replace or patch anything - your existing **Latest data** stays exactly as it is, and this page sits next to it with its own saved filters.

## What it looks like

<div align="center">
<img src="./.readme/screen/01-overview.png" width="880" alt="Sorted by Last value, ascending">
<br><em>Sorted by <strong>Last value</strong>, ascending - 1 B, 10 B, 75 B, 500 B, 8.79 KB.</em>
<br><br>
<img src="./.readme/screen/02-sorted-desc.png" width="880" alt="Sorted by Last value, descending">
<br><em>One more click and the same column runs the other way.</em>
</div>

## Install

The module ships as a **GPG-signed `deb` / `rpm` package** from the initMAX repository - `apt` / `dnf` installs it and keeps it updated.

### Easiest way - the guided installer on the Portal

Open the product page, pick your **OS**, and copy the ready-made command. It is fully public, no login needed. There's a feedback box right there too.

<p align="center"><a href="https://portal.initmax.com/catalog/zabbix-sortable-latest-data#how-to-install"><strong>→ Open the installer on the Portal</strong></a></p>

Prefer a plain archive? Every release also ships as a **ZIP** [straight from the repo](https://repo.initmax.com/zabbix/free/zip/sortable-latest-data/) - handy for offline or manual installs.

Then enable it in **Administration → General → Modules** and open **Monitoring → Sortable latest data**. Done.

## Requirements

|              |                                                              |
| ------------ | ------------------------------------------------------------ |
| **Zabbix**   | 6.0 · 6.2 · 6.4 · 7.0 · 7.2 · 7.4 - one package covers all    |
| **PHP**      | 7.4 or newer                                                 |
| **OS**       | Debian/Ubuntu · RHEL/Rocky/Alma/Oracle/Amazon · SUSE         |
| **Edition**  | FREE - there is no paid edition of this module               |
| **Languages** | Every language Zabbix supports. The page is Zabbix's own, so every label on it is already translated; the module adds one string, the menu entry |
| **High availability** | Ready. No server-side component and no local state; install it on every frontend node of an HA cluster and any node can serve it |

One package covers the whole range. Zabbix changed its module API at 6.4, and the package carries what each frontend needs, so the same install works on 6.0 and on 7.4.

### What the page does the same everywhere, and what it does not

The module does not draw the table - Zabbix does, on the release you have installed. So the page always looks and behaves exactly like *your* Latest data, and the differences below are Zabbix's own, not the module's:

- **6.0** has no **State** filter and no **Execute now** button, because that Latest data page does not.
- **6.0 - 6.4** show no *binary value* rows and no raw-data hint, for the same reason.

The one honest limit of the sorting itself: **Last value** orders the page you are looking at. Host and Name are columns of the item table and Zabbix orders them in the database before paging; last values are read from history for the rows on the current page only, so with more than one page of results the value order is per page. Narrow the filter, or raise **Rows per page** in your user profile, to sort a larger set at once.

## Support &amp; links

- 📚 **[Documentation / Wiki](https://www.initmax.com/wiki/sortable-latest-data/)**
- 🛒 **[Product page](https://www.initmax.com/product/sortable-latest-data/)**
- 🎫 **[Portal](https://portal.initmax.com)** - downloads, support tickets
- 💾 **Source code** (AGPLv3) - included in every package and published as a [source archive](https://repo.initmax.com/zabbix/free/zip/sortable-latest-data/) on repo.initmax.com
- ✉️ **[support@initmax.com](mailto:support@initmax.com)**

---

<div align="center">
<sub><a href="https://www.gnu.org/licenses/agpl-3.0.html">AGPLv3</a> &nbsp;·&nbsp; © 2021–2026 initMAX s.r.o.</sub>
</div>
