# voices.aaja.org WordPress template

required setup (in WordPress)
- Create page "Home" and set as homepage in WordPress settings
- Install plugin [TailPress](https://wordpress.org/plugins/tailpress/)
- Go to Settings > TailPress and change the config to (also in tailwind.config.json):

```
{
    "preflight":true,
    "theme": {
        "extend": {
            "colors": {
                "tblue": "#38557D",
                "tlightblue": "#A5BFD3",
                "tyellow": "#F4D596",
                "tlightyellow": "#EDC065",
                "tpurple": "#43233D",
                "tlightpurple": "#B39EAA",
                "tred": "#AC3437",
                "tgray": "#343534",
                "tlightgray": "#9F9F9E"
            }
        }
    }
 }
```