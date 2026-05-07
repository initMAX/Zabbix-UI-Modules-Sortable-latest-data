<div align="center">
    <a href="http://www.initmax.com"><img src="./.readme/logo/initMAX_banner.png" alt="initMAX Logo"></a>
    <h3>
        <span>
            Honesty, diligence and MAXimum knowledge of our products is our standard.
        </span>
    </h3>
    <h3>
        <a href="https://www.linkedin.com/company/initmax/">
            <img alt="Static Badge" src="./.readme/logo/linkedin.png" height="32">
        </a>&nbsp;&nbsp;&nbsp;
        <a href="https://www.youtube.com/@initmax1">
            <img alt="Static Badge" src="./.readme/logo/youtube.png" height="32">
        </a>&nbsp;&nbsp;&nbsp;
        <a href="https://www.facebook.com/initmax">
            <img alt="Static Badge" src="./.readme/logo/facebook.png" height="32">
        </a>&nbsp;&nbsp;&nbsp;
        <a href="https://www.instagram.com/initmax/">
            <img alt="Static Badge" src="./.readme/logo/instagram.png" height="32">
        </a>&nbsp;&nbsp;&nbsp;
        <a href="https://x.com/initmax">
            <img alt="Static Badge" src="./.readme/logo/x.png" height="32">
        </a>&nbsp;&nbsp;&nbsp;
        <a href="https://github.com/initmax">
            <img alt="Static Badge" src="./.readme/logo/github.png" height="32">
        </a>
    </h3>
</div>
<br>

---
---

<br>
<br>
<!-- *********************************************************************************************************************************** -->
<!-- *** TITLE ************************************************************************************************************************* -->
<!-- *********************************************************************************************************************************** -->
<div align="center">
    <h1>
        Sortable latest data
    </h1>
    <h4><i>
        A module that can sort data by the last value.
    </i></h4>
    <br>
    <img alt="Required Zabbix version" src="https://img.shields.io/badge/Required%20Zabbix%20version-7.0-red">
    <img alt="Required PHP version" src="https://img.shields.io/badge/Required%20php%20version-8.0-blue">
    <h3>
        <a href="#description">Description</a> &nbsp;•&nbsp;
        <a href="#key-features">Key Features</a> &nbsp;•&nbsp;
        <a href="#documentation">Documentation</a> &nbsp;•&nbsp;
        <a href="#installation">Installation</a>
    </h3>
    <br>
    <img src="./.readme/screen/Sortable_Latest_data.png" width="1000">
</div>
<br>
<br>

<!-- *********************************************************************************************************************************** -->
<!-- *** BODY ************************************************************************************************************************** -->
<!-- *********************************************************************************************************************************** -->
<a id="description"></a>
## Description

A fork of the standard "Latest data" tab in the Zabbix monitoring menu.
This module makes the Latest data table sortable by value in ascending or
descending order — useful when you need to find the highest CPU loads,
the largest disk fills, or the slowest response times across your hosts
without writing a custom dashboard.

<br>

<a id="key-features"></a>
## Key Features

- **Sort by value** — ascending or descending on the standard Latest data view.
- **Drop-in replacement** — installs as a module; the original Latest data tab is replaced.
- **Compatibility** — Zabbix 7.0+, PHP 8.0+.

<!-- !!! TODO: confirm/extend the feature list — refine if there are configuration options or additional sorts !!! -->

<br>

<a id="documentation"></a>
## Documentation

<div align="center">
    <a href="https://www.initmax.com/wiki/sortable-latest-data/">
        <img alt="wiki" src="./.readme/logo/wiki.png" height="32"><br>
        <b>Full documentation on the initMAX wiki</b><br>
        <img alt="arrow" src="./.readme/logo/arrow.png" height="32">
    </a>
</div>

<br>

<!-- *********************************************************************************************************************************** -->
<!-- *** INSTALLATION ******************************************************************************************************************* -->
<!-- *********************************************************************************************************************************** -->
<a id="installation"></a>
## Installation

- Connect to your Zabbix frontend server (perform on all frontend nodes) via SSH.

- Navigate to the `ui/modules/` directory (`ui` is typically located at `/usr/share/zabbix/ui/`)
    ```sh
    cd /usr/share/zabbix/ui/modules/
    ```

- Clone the repository on your server
    ```sh
    git clone https://git.initmax.cz/initMAX-Public/zabbix/modules/Zabbix-UI-Modules-Sortable-latest-data.git
    ```

- Change ownership of the directory to the user under which your Zabbix frontend runs:
    ```sh
    chown nginx:nginx ./Zabbix-UI-Modules-Sortable-latest-data*
    ```
    ```sh
    chown apache:apache ./Zabbix-UI-Modules-Sortable-latest-data*
    ```
    ```sh
    chown www-data:www-data ./Zabbix-UI-Modules-Sortable-latest-data*
    ```

- Open the Zabbix frontend menu → Administration → General → Modules
- Click **Scan directory** at the top
- Enable the newly discovered Sortable Latest Data module
- Open Monitoring → Latest data — column headers are now clickable to sort by value.

<br>
<br>

---
---

<br>
<div align="center">
    <a href="https://www.initmax.com/">
        <img alt="web" src="./.readme/logo/web.png" height="32"> initMAX.com
    </a>&nbsp;&nbsp;&nbsp;
    <a href="tel:+420800244442">
        <img alt="phone" src="./.readme/logo/phone.png" height="32"> +420800244442
    </a>&nbsp;&nbsp;&nbsp;
    <a href="mailto:info@initmax.com">
        <img alt="mail" src="./.readme/logo/mail.png" height="32"> info@initmax.com
    </a>
    <br><br><br>
    <a href="https://www.linkedin.com/company/initmax/">
        <img alt="linkedin" src="./.readme/logo/linkedin.png" height="32">
    </a>&nbsp;
    <a href="https://www.youtube.com/@initmax1">
        <img alt="youtube" src="./.readme/logo/youtube.png" height="32">
    </a>&nbsp;
    <a href="https://www.facebook.com/initmax">
        <img alt="facebook" src="./.readme/logo/facebook.png" height="32">
    </a>&nbsp;
    <a href="https://www.instagram.com/initmax/">
        <img alt="instagram" src="./.readme/logo/instagram.png" height="32">
    </a>&nbsp;
    <a href="https://x.com/initmax">
        <img alt="x" src="./.readme/logo/x.png" height="32">
    </a>&nbsp;
    <a href="https://github.com/initmax">
        <img alt="github" src="./.readme/logo/github.png" height="32">
    </a><br><br><br>
    <a><img src="./.readme/logo/zabbix-premium-partner.png" alt="Zabbix premium partner" width="80"></a>&nbsp;&nbsp;&nbsp;
    <a><img src="./.readme/logo/zabbix-certified-trainer.png" alt="Zabbix certified trainer" width="80"></a>
    <br><br><br>
    <a>
        <img src="./.readme/logo/agplv3.png" alt="agplv3" width="100">
    </a>
</div>