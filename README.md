# Ansible Installer

This is originally taken form the
[composer/installers](https://github.com/composer/installers) and
[monofone/ansible-installer](https://github.com/monofone/ansible-installer). It
is adapted to work as an [ansible](http://www.ansible.com/home) role installer.

It is modified to work for Ansible only provisioning projects where the
`composer.json` contains only ansible roles to depend on. For this
we are working to provide an experimental satis with ansible roles.


## Example `composer.json` File for Ansible role

This is an example for a ansible role. The only important parts to set in your
composer.json file are `"type": "ansible-role"` which describes what your
package is and `"require": { "ansible/installer": "~1.0" }` which tells composer
to load the custom installers.

```json
{
    "name": "you/mysql",
    "type": "ansible-role",
    "require": {
        "qafoolabs/ansible-installer": "~1.0"
    }
}
```

This would install your role to the `roles/` folder when a
user runs `php composer.phar install`.

This requires that the ansible-role has the following directory structure:

    my-role/
    ├── defaults
    ├── files
    ├── handlers
    │   └── main.yml
    ├── meta
    ├── tasks
    │   └── main.yml
    ├── templates
    ├── composer.json
    └── README.md
