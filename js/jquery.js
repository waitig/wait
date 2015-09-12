!
function(b) {
    b(function() {
        b.support.transition = function() {
            var c = function() {
                var f, e = document.createElement("bootstrap"),
                d = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    transition: "transitionend"
                };
                for (f in d) {
                    if (void 0 !== e.style[f]) {
                        return d[f]
                    }
                }
            } ();
            return c && {
                end: c
            }
        } ()
    })
} (window.jQuery),
!
function(e) {
    var f, d = function(a, g) {
        this.options = g,
        this.$element = e(a).delegate('[data-dismiss="modal"]', "click.dismiss.modal", e.proxy(this.hide, this)),
        this.options.remote && this.$element.find(".modal-body").load(this.options.remote)
    };
    d.prototype = {
        constructor: d,
        toggle: function() {
            return this[this.isShown ? "hide": "show"]()
        },
        show: function() {
            var a = this,
            g = e.Event("show");
            this.$element.trigger(g),
            this.isShown || g.isDefaultPrevented() || (this.isShown = !0, this.escape(), this.backdrop(function() {
                var b = e.support.transition && a.$element.hasClass("fade");
                a.$element.parent().length || a.$element.appendTo(document.body),
                a.$element.show(),
                b && a.$element[0].offsetWidth,
                a.$element.addClass("in").attr("aria-hidden", !1),
                a.enforceFocus(),
                b ? a.$element.one(e.support.transition.end,
                function() {
                    a.$element.focus().trigger("shown")
                }) : a.$element.focus().trigger("shown")
            }))
        },
        hide: function(a) {
            a && a.preventDefault(),
            a = e.Event("hide"),
            this.$element.trigger(a),
            this.isShown && !a.isDefaultPrevented() && (this.isShown = !1, this.escape(), e(document).off("focusin.modal"), this.$element.removeClass("in").attr("aria-hidden", !0), e.support.transition && this.$element.hasClass("fade") ? this.hideWithTransition() : this.hideModal())
        },
        enforceFocus: function() {
            var a = this;
            e(document).on("focusin.modal",
            function(b) {
                a.$element[0] === b.target || a.$element.has(b.target).length || a.$element.focus()
            })
        },
        escape: function() {
            var b = this;
            this.isShown && this.options.keyboard ? this.$element.on("keyup.dismiss.modal",
            function(a) {
                27 == a.which && b.hide()
            }) : this.isShown || this.$element.off("keyup.dismiss.modal")
        },
        hideWithTransition: function() {
            var a = this,
            g = setTimeout(function() {
                a.$element.off(e.support.transition.end),
                a.hideModal()
            },
            500);
            this.$element.one(e.support.transition.end,
            function() {
                clearTimeout(g),
                a.hideModal()
            })
        },
        hideModal: function() {
            var b = this;
            this.$element.hide(),
            this.backdrop(function() {
                b.removeBackdrop(),
                b.$element.trigger("hidden")
            })
        },
        removeBackdrop: function() {
            this.$backdrop && this.$backdrop.remove(),
            this.$backdrop = null
        },
        backdrop: function(a) {
            var c, g = this.$element.hasClass("fade") ? "fade": "";
            if (this.isShown && this.options.backdrop) {
                if (c = e.support.transition && g, this.$backdrop = e('<div class="modal-backdrop ' + g + '" />').appendTo(document.body), this.$backdrop.click("static" == this.options.backdrop ? e.proxy(this.$element[0].focus, this.$element[0]) : e.proxy(this.hide, this)), c && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !a) {
                    return
                }
                c ? this.$backdrop.one(e.support.transition.end, a) : a()
            } else { ! this.isShown && this.$backdrop ? (this.$backdrop.removeClass("in"), e.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one(e.support.transition.end, a) : a()) : a && a()
            }
        }
    },
    f = e.fn.modal,
    e.fn.modal = function(a) {
        return this.each(function() {
            var g = e(this),
            c = g.data("modal"),
            b = e.extend({},
            e.fn.modal.defaults, g.data(), "object" == typeof a && a);
            c || g.data("modal", c = new d(this, b)),
            "string" == typeof a ? c[a]() : b.show && c.show()
        })
    },
    e.fn.modal.defaults = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    },
    e.fn.modal.Constructor = d,
    e.fn.modal.noConflict = function() {
        return e.fn.modal = f,
        this
    },
    e(document).on("click.modal.data-api", '[data-toggle="modal"]',
    function(a) {
        var j = e(this),
        i = j.attr("href"),
        h = e(j.attr("data-target") || i && i.replace(/.*(?=#[^\s]+$)/, "")),
        g = h.data("modal") ? "toggle": e.extend({
            remote: !/#/.test(i) && i
        },
        h.data(), j.data());
        a.preventDefault(),
        h.modal(g).one("hide",
        function() {
            j.focus()
        })
    })
} (window.jQuery),
!
function(h) {
    function k() {
        h(g).each(function() {
            j(h(this)).removeClass("open")
        })
    }
    function j(a) {
        var e, f = a.attr("data-target");
        return f || (f = a.attr("href"), f = f && /#/.test(f) && f.replace(/.*(?=#[^\s]*$)/, "")),
        e = f && h(f),
        e && e.length || (e = a.parent()),
        e
    }
    var i, g = "[data-toggle=dropdown]",
    l = function(a) {
        var d = h(a).on("click.dropdown.data-api", this.toggle);
        h("html").on("click.dropdown.data-api",
        function() {
            d.parent().removeClass("open")
        })
    };
    l.prototype = {
        constructor: l,
        toggle: function() {
            var b, a, d = h(this);
            if (!d.is(".disabled, :disabled")) {
                return b = j(d),
                a = b.hasClass("open"),
                k(),
                a || b.toggleClass("open"),
                d.focus(),
                !1
            }
        },
        keydown: function(p) {
            var o, m, e, b, a;
            if (/(38|40|27)/.test(p.keyCode) && (o = h(this), p.preventDefault(), p.stopPropagation(), !o.is(".disabled, :disabled"))) {
                if (e = j(o), b = e.hasClass("open"), !b || b && 27 == p.keyCode) {
                    return 27 == p.which && e.find(g).focus(),
                    o.click()
                }
                m = h("[role=menu] li:not(.divider):visible a", e),
                m.length && (a = m.index(m.filter(":focus")), 38 == p.keyCode && a > 0 && a--, 40 == p.keyCode && a < m.length - 1 && a++, ~a || (a = 0), m.eq(a).focus())
            }
        }
    },
    i = h.fn.dropdown,
    h.fn.dropdown = function(a) {
        return this.each(function() {
            var c = h(this),
            b = c.data("dropdown");
            b || c.data("dropdown", b = new l(this)),
            "string" == typeof a && b[a].call(c)
        })
    },
    h.fn.dropdown.Constructor = l,
    h.fn.dropdown.noConflict = function() {
        return h.fn.dropdown = i,
        this
    },
    h(document).on("click.dropdown.data-api", k).on("click.dropdown.data-api", ".dropdown form",
    function(b) {
        b.stopPropagation()
    }).on("click.dropdown-menu",
    function(b) {
        b.stopPropagation()
    }).on("click.dropdown.data-api", g, l.prototype.toggle).on("keydown.dropdown.data-api", g + ", [role=menu]", l.prototype.keydown)
} (window.jQuery),
!
function(e) {
    var f, d = function(a) {
        this.element = e(a)
    };
    d.prototype = {
        constructor: d,
        show: function() {
            var j, i, h, a = this.element,
            l = a.closest("ul:not(.dropdown-menu)"),
            k = a.attr("data-target");
            k || (k = a.attr("href"), k = k && k.replace(/.*(?=#[^\s]*$)/, "")),
            a.parent("li").hasClass("active") || (j = l.find(".active:last a")[0], h = e.Event("show", {
                relatedTarget: j
            }), a.trigger(h), h.isDefaultPrevented() || (i = e(k), this.activate(a.parent("li"), l), this.activate(i, i.parent(),
            function() {
                a.trigger({
                    type: "shown",
                    relatedTarget: j
                })
            })))
        },
        activate: function(a, l, k) {
            function h() {
                j.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"),
                a.addClass("active"),
                i ? (a[0].offsetWidth, a.addClass("in")) : a.removeClass("fade"),
                a.parent(".dropdown-menu") && a.closest("li.dropdown").addClass("active"),
                k && k()
            }
            var j = l.find("> .active"),
            i = k && e.support.transition && j.hasClass("fade");
            i ? j.one(e.support.transition.end, h) : h(),
            j.removeClass("in")
        }
    },
    f = e.fn.tab,
    e.fn.tab = function(a) {
        return this.each(function() {
            var c = e(this),
            b = c.data("tab");
            b || c.data("tab", b = new d(this)),
            "string" == typeof a && b[a]()
        })
    },
    e.fn.tab.Constructor = d,
    e.fn.tab.noConflict = function() {
        return e.fn.tab = f,
        this
    },
    e(document).on("click.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"]',
    function(a) {
        a.preventDefault(),
        e(this).tab("show")
    })
} (window.jQuery),
!
function(e) {
    var f, d = function(g, c) {
        this.init("tooltip", g, c)
    };
    d.prototype = {
        constructor: d,
        init: function(a, q, p) {
            var o, m, l, k, j;
            for (this.type = a, this.$element = e(q), this.options = this.getOptions(p), this.enabled = !0, l = this.options.trigger.split(" "), j = l.length; j--;) {
                k = l[j],
                "click" == k ? this.$element.on("click." + this.type, this.options.selector, e.proxy(this.toggle, this)) : "manual" != k && (o = "hover" == k ? "mouseenter": "focus", m = "hover" == k ? "mouseleave": "blur", this.$element.on(o + "." + this.type, this.options.selector, e.proxy(this.enter, this)), this.$element.on(m + "." + this.type, this.options.selector, e.proxy(this.leave, this)))
            }
            this.options.selector ? this._options = e.extend({},
            this.options, {
                trigger: "manual",
                selector: ""
            }) : this.fixTitle()
        },
        getOptions: function(a) {
            return a = e.extend({},
            e.fn[this.type].defaults, this.$element.data(), a),
            a.delay && "number" == typeof a.delay && (a.delay = {
                show: a.delay,
                hide: a.delay
            }),
            a
        },
        enter: function(a) {
            var g, i = e.fn[this.type].defaults,
            h = {};
            return this._options && e.each(this._options,
            function(j, c) {
                i[j] != c && (h[j] = c)
            },
            this),
            g = e(a.currentTarget)[this.type](h).data(this.type),
            g.options.delay && g.options.delay.show ? (clearTimeout(this.timeout), g.hoverState = "in", this.timeout = setTimeout(function() {
                "in" == g.hoverState && g.show()
            },
            g.options.delay.show), void 0) : g.show()
        },
        leave: function(a) {
            var g = e(a.currentTarget)[this.type](this._options).data(this.type);
            return this.timeout && clearTimeout(this.timeout),
            g.options.delay && g.options.delay.hide ? (g.hoverState = "out", this.timeout = setTimeout(function() {
                "out" == g.hoverState && g.hide()
            },
            g.options.delay.hide), void 0) : g.hide()
        },
        show: function() {
            var a, o, m, l, k, j, i = e.Event("show");
            if (this.hasContent() && this.enabled) {
                if (this.$element.trigger(i), i.isDefaultPrevented()) {
                    return
                }
                switch (a = this.tip(), this.setContent(), this.options.animation && a.addClass("fade"), k = "function" == typeof this.options.placement ? this.options.placement.call(this, a[0], this.$element[0]) : this.options.placement, a.detach().css({
                    top: 0,
                    left: 0,
                    display: "block"
                }), this.options.container ? a.appendTo(this.options.container) : a.insertAfter(this.$element), o = this.getPosition(), m = a[0].offsetWidth, l = a[0].offsetHeight, k) {
                case "bottom":
                    j = {
                        top: o.top + o.height,
                        left: o.left + o.width / 2 - m / 2
                    };
                    break;
                case "top":
                    j = {
                        top: o.top - l,
                        left: o.left + o.width / 2 - m / 2
                    };
                    break;
                case "left":
                    j = {
                        top: o.top + o.height / 2 - l / 2,
                        left: o.left - m
                    };
                    break;
                case "right":
                    j = {
                        top: o.top + o.height / 2 - l / 2,
                        left: o.left + o.width
                    }
                }
                this.applyPlacement(j, k),
                this.$element.trigger("shown")
            }
        },
        applyPlacement: function(s, r) {
            var m, l, k, j, q = this.tip(),
            p = q[0].offsetWidth,
            o = q[0].offsetHeight;
            q.offset(s).addClass(r).addClass("in"),
            m = q[0].offsetWidth,
            l = q[0].offsetHeight,
            "top" == r && l != o && (s.top = s.top + o - l, j = !0),
            "bottom" == r || "top" == r ? (k = 0, s.left < 0 && (k = -2 * s.left, s.left = 0, q.offset(s), m = q[0].offsetWidth, l = q[0].offsetHeight), this.replaceArrow(k - p + m, m, "left")) : this.replaceArrow(l - o, l, "top"),
            j && q.offset(s)
        },
        replaceArrow: function(h, g, i) {
            this.arrow().css(i, h ? 50 * (1 - h / g) + "%": "")
        },
        setContent: function() {
            var g = this.tip(),
            c = this.getTitle();
            g.find(".tooltip-inner")[this.options.html ? "html": "text"](c),
            g.removeClass("fade in top bottom left right")
        },
        hide: function() {
            function a() {
                var c = setTimeout(function() {
                    g.off(e.support.transition.end).detach()
                },
                500);
                g.one(e.support.transition.end,
                function() {
                    clearTimeout(c),
                    g.detach()
                })
            }
            var g = this.tip(),
            b = e.Event("hide");
            return this.$element.trigger(b),
            b.isDefaultPrevented() ? void 0 : (g.removeClass("in"), e.support.transition && this.$tip.hasClass("fade") ? a() : g.detach(), this.$element.trigger("hidden"), this)
        },
        fixTitle: function() {
            var b = this.$element; (b.attr("title") || "string" != typeof b.attr("data-original-title")) && b.attr("data-original-title", b.attr("title") || "").attr("title", "")
        },
        hasContent: function() {
            return this.getTitle()
        },
        getPosition: function() {
            var a = this.$element[0];
            return e.extend({},
            "function" == typeof a.getBoundingClientRect ? a.getBoundingClientRect() : {
                width: a.offsetWidth,
                height: a.offsetHeight
            },
            this.$element.offset())
        },
        getTitle: function() {
            var h, g = this.$element,
            i = this.options;
            return h = g.attr("data-original-title") || ("function" == typeof i.title ? i.title.call(g[0]) : i.title)
        },
        tip: function() {
            return this.$tip = this.$tip || e(this.options.template)
        },
        arrow: function() {
            return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
        },
        validate: function() {
            this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
        },
        enable: function() {
            this.enabled = !0
        },
        disable: function() {
            this.enabled = !1
        },
        toggleEnabled: function() {
            this.enabled = !this.enabled
        },
        toggle: function(a) {
            var g = a ? e(a.currentTarget)[this.type](this._options).data(this.type) : this;
            g.tip().hasClass("in") ? g.hide() : g.show()
        },
        destroy: function() {
            this.hide().$element.off("." + this.type).removeData(this.type)
        }
    },
    f = e.fn.tooltip,
    e.fn.tooltip = function(a) {
        return this.each(function() {
            var g = e(this),
            c = g.data("tooltip"),
            b = "object" == typeof a && a;
            c || g.data("tooltip", c = new d(this, b)),
            "string" == typeof a && c[a]()
        })
    },
    e.fn.tooltip.Constructor = d,
    e.fn.tooltip.defaults = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1
    },
    e.fn.tooltip.noConflict = function() {
        return e.fn.tooltip = f,
        this
    }
} (window.jQuery),
!
function(e) {
    var f, d = function(g, c) {
        this.init("popover", g, c)
    };
    d.prototype = e.extend({},
    e.fn.tooltip.Constructor.prototype, {
        constructor: d,
        setContent: function() {
            var h = this.tip(),
            g = this.getTitle(),
            i = this.getContent();
            h.find(".popover-title")[this.options.html ? "html": "text"](g),
            h.find(".popover-content")[this.options.html ? "html": "text"](i),
            h.removeClass("fade top bottom left right in")
        },
        hasContent: function() {
            return this.getTitle() || this.getContent()
        },
        getContent: function() {
            var h, g = this.$element,
            i = this.options;
            return h = ("function" == typeof i.content ? i.content.call(g[0]) : i.content) || g.attr("data-content")
        },
        tip: function() {
            return this.$tip || (this.$tip = e(this.options.template)),
            this.$tip
        },
        destroy: function() {
            this.hide().$element.off("." + this.type).removeData(this.type)
        }
    }),
    f = e.fn.popover,
    e.fn.popover = function(a) {
        return this.each(function() {
            var g = e(this),
            c = g.data("popover"),
            b = "object" == typeof a && a;
            c || g.data("popover", c = new d(this, b)),
            "string" == typeof a && c[a]()
        })
    },
    e.fn.popover.Constructor = d,
    e.fn.popover.defaults = e.extend({},
    e.fn.tooltip.defaults, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }),
    e.fn.popover.noConflict = function() {
        return e.fn.popover = f,
        this
    }
} (window.jQuery);
eval(function(h, b, i, d, g, f) {
    g = function(a) {
        return (a < 62 ? "": g(parseInt(a / 62))) + ((a = a % 62) > 35 ? String.fromCharCode(a + 29) : a.toString(36))
    };
    if ("0".replace(0, g) == 0) {
        while (i--) {
            f[g(i)] = d[i]
        }
        d = [function(a) {
            return f[a] || a
        }];
        g = function() {
            return "([6P-RT-Y]|[1-3]\\w)"
        };
        i = 1
    }
    while (i--) {
        if (d[i]) {
            h = h.replace(new RegExp("\\b" + g(i) + "\\b", "g"), d[i])
        }
    }
    return h
} ('6 q=1s;19.2I=!0;(U(){U L(a){U m(a){6 f=a.24(0);T(f!==92)V f;6 b=a.1n(1);V(f=r[b])?f:"0"<=b&&b<="7"?2J(a.W(1),8):b==="u"||b==="x"?2J(a.W(2),16):a.24(1)}U e(a){T(a<32)V(a<16?"\\\\x0":"\\\\x")+a.toString(16);a=2K.2L(a);T(a==="\\\\"||a==="-"||a==="["||a==="]")a="\\\\"+a;V a}U h(a){P(6 f=a.W(1,a.Q-1).1a(/\\\\u[\\dA-Fa-f]{4}|\\\\x[\\dA-Fa-f]{2}|\\\\[0-3][0-7]{0,2}|\\\\[0-7]{1,2}|\\\\[\\S\\s]|[^\\\\]/g),a=[],b=[],o=f[0]==="^",c=o?1:0,i=f.Q;c<i;++c){6 j=f[c];T(/\\\\[bdsw]/i.1i(j))a.R(j);14{6 j=m(j),d;c+2<i&&"-"===f[c+1]?(d=m(f[c+2]),c+=2):d=j;b.R([j,d]);d<65||j>25||(d<65||j>90||b.R([1j.1F(65,j)|32,1j.26(d,90)|32]),d<97||j>25||b.R([1j.1F(97,j)&-33,1j.26(d,25)&-33]))}}b.sort(U(a,f){V a[0]-f[0]||f[1]-a[1]});f=[];j=[27,27];P(c=0;c<b.Q;++c)i=b[c],i[0]<=j[1]+1?j[1]=1j.1F(j[1],i[1]):f.R(j=i);b=["["];o&&b.R("^");b.R.2O(b,a);P(c=0;c<f.Q;++c)i=f[c],b.R(e(i[0])),i[1]>i[0]&&(i[1]+1>i[0]&&b.R("-"),b.R(e(i[1])));b.R("]");V b.1G("")}U y(a){P(6 f=a.2P.1a(/\\[(?:[^\\\\\\]]|\\\\[\\S\\s])*]|\\\\u[\\dA-Fa-f]{4}|\\\\x[\\dA-Fa-f]{2}|\\\\\\d+|\\\\[^\\dux]|\\(\\?[!:=]|[()^]|[^()[\\\\^]+/g),b=f.Q,d=[],c=0,i=0;c<b;++c){6 j=f[c];j==="("?++i:"\\\\"===j.1n(0)&&(j=+j.W(1))&&j<=i&&(d[j]=-1)}P(c=1;c<d.Q;++c)-1===d[c]&&(d[c]=++t);P(i=c=0;c<b;++c)j=f[c],j==="("?(++i,d[i]===1t 0&&(f[c]="(?:")):"\\\\"===j.1n(0)&&(j=+j.W(1))&&j<=i&&(f[c]="\\\\"+d[i]);P(i=c=0;c<b;++c)"^"===f[c]&&"^"!==f[c+1]&&(f[c]="");T(a.2Q&&s)P(c=0;c<b;++c)j=f[c],a=j.1n(0),j.Q>=2&&a==="["?f[c]=h(j):a!=="\\\\"&&(f[c]=j.1e(/[A-Za-z]/g,U(a){a=a.24(0);V"["+2K.2L(a&-33,a|32)+"]"}));V f.1G("")}P(6 t=0,s=!1,l=!1,p=0,d=a.Q;p<d;++p){6 g=a[p];T(g.2Q)l=!0;14 T(/[a-z]/i.1i(g.2P.1e(/\\\\u[\\da-f]{4}|\\\\x[\\da-f]{2}|\\\\[^UXux]/gi,""))){s=!0;l=!1;1b}}P(6 r={b:8,t:9,n:10,v:11,f:12,r:13},n=[],p=0,d=a.Q;p<d;++p){g=a[p];T(g.2S||g.multiline)29 Error(""+g);n.R("(?:"+y(g)+")")}V 2T(n.1G("|"),l?"gi":"g")}U M(a){U m(a){2a(a.1u){15 1:T(e.1i(a.17))1b;P(6 g=a.1o;g;g=g.1c)m(g);g=a.2U;T("BR"===g||"LI"===g)h[s]="\\n",t[s<<1]=y++,t[s++<<1|1]=a;1b;15 3:15 4:g=a.1v,g.Q&&(g=p?g.1e(/\\r\\n?/g,"\\n"):g.1e(/[\\t\\n\\r ]+/g," "),h[s]=g,t[s<<1]=y,y+=g.Q,t[s++<<1|1]=a)}}6 e=/(?:^|\\s)2b(?:\\s|$)/,h=[],y=0,t=[],s=0,l;a.1H?l=a.1H.2X:19.1I&&(l=1w.2Y.1I(a,q).2Z("30-31"));6 p=l&&"1J"===l.W(0,3);m(a);V{a:h.1G("").1e(/\\n$/,""),c:t}}U B(a,m,e,h){m&&(a={a:m,d:a},e(a),h.R.2O(h,a.e))}U x(a,m){U e(a){P(6 l=a.d,p=[l,"1f"],d=0,g=a.a.1a(y)||[],r={},n=0,z=g.Q;n<z;++n){6 f=g[n],b=r[f],o=1t 0,c;T(1K b==="2c")c=!1;14{6 i=h[f.1n(0)];T(i)o=f.1a(i[1]),b=i[0];14{P(c=0;c<t;++c)T(i=m[c],o=f.1a(i[1])){b=i[0];1b}o||(b="1f")}T((c=b.Q>=5&&"X-"===b.W(0,5))&&!(o&&1K o[1]==="2c"))c=!1,b="34";c||(r[f]=b)}i=d;d+=f.Q;T(c){c=o[1];6 j=f.2d(c),k=j+c.Q;o[2]&&(k=f.Q-o[2].Q,j=k-c.Q);b=b.W(5);B(l+i,f.W(0,j),e,p);B(l+i+j,c,C(b,c),p);B(l+i+k,f.W(k),e,p)}14 p.R(l+i,b)}a.e=p}6 h={},y;(U(){P(6 e=a.concat(m),l=[],p={},d=0,g=e.Q;d<g;++d){6 r=e[d],n=r[3];T(n)P(6 k=n.Q;--k>=0;)h[n.1n(k)]=r;r=r[1];n=""+r;p.2e(n)||(l.R(r),p[n]=q)}l.R(/[\\S\\s]/);y=L(l)})();6 t=m.Q;V e}U u(a){6 m=[],e=[];a.2f?m.R(["1k",/^(?:\'\'\'(?:[^\'\\\\]|\\\\[\\S\\s]|\'\'?(?=[^\']))*(?:\'\'\'|$)|"""(?:[^"\\\\]|\\\\[\\S\\s]|""?(?=[^"]))*(?:"""|$)|\'(?:[^\'\\\\]|\\\\[\\S\\s])*(?:\'|$)|"(?:[^"\\\\]|\\\\[\\S\\s])*(?:"|$))/,q,"\'\\""]):a.1p?m.R(["1k",/^(?:\'(?:[^\'\\\\]|\\\\[\\S\\s])*(?:\'|$)|"(?:[^"\\\\]|\\\\[\\S\\s])*(?:"|$)|`(?:[^\\\\`]|\\\\[\\S\\s])*(?:`|$))/,q,"\'\\"`"]):m.R(["1k",/^(?:\'(?:[^\\n\\r\'\\\\]|\\\\.)*(?:\'|$)|"(?:[^\\n\\r"\\\\]|\\\\.)*(?:"|$))/,q,"\\"\'"]);a.35&&e.R(["1k",/^@"(?:[^"]|"")*(?:"|$)/,q]);6 h=a.1d;h&&(a.1g?(h>1?m.R(["1l",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,q,"#"]):m.R(["1l",/^#(?:(?:define|2g|14|endif|error|ifdef|include|ifndef|line|pragma|1L|warning)\\b|[^\\n\\r]*)/,q,"#"]),e.R(["1k",/^<(?:(?:(?:\\.\\.\\/)*|\\/?)(?:[\\w-]+(?:\\/[\\w-]+)+)?[\\w-]+\\.h|[a-z]\\w*)>/,q])):m.R(["1l",/^#[^\\n\\r]*/,q,"#"]));a.1g&&(e.R(["1l",/^\\/\\/[^\\n\\r]*/,q]),e.R(["1l",/^\\/\\*[\\S\\s]*?(?:\\*\\/|$)/,q]));a.1q&&e.R(["X-36",/^(?:^^\\.?|[!+-]|!=|!==|#|%|%=|&|&&|&&=|&=|\\(|\\*|\\*=|\\+=|,|-=|->|\\/|\\/=|:|::|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|[?@[^]|\\^=|\\^\\^|\\^\\^=|{|\\||\\|=|\\|\\||\\|\\|=|~|1b|15|37|1M|do|14|1O|38|V|29|1x|1K)\\s*(\\/(?=[^*/])(?:[^/[\\\\]|\\\\[\\S\\s]|\\[(?:[^\\\\\\]]|\\\\[\\S\\s])*(?:]|$))+\\/)/]);(h=a.2h)&&e.R(["2i",h]);a=(""+a.Y).1e(/^ | $/g,"");a.Q&&e.R(["39",2T("^(?:"+a.1e(/[\\s,]+/g,"|")+")\\\\b"),q]);m.R(["1f",/^\\s+/,q," \\r\\n\\t\\3a"]);e.R(["2j",/^@[$_a-z][\\w$@]*/i,q],["2i",/^(?:[@_]?[A-Z]+[a-z][\\w$@]*|\\w+_t\\b)/,q],["1f",/^[$_a-z][\\w$@]*/i,q],["2j",/^(?:0x[\\da-f]+|(?:\\d(?:_\\d+)*\\d*(?:\\.\\d*)?|\\.\\d\\+)(?:e[+-]?\\d+)?)[a-z]*/i,q,"0123456789"],["1f",/^\\\\[\\S\\s]?/,q],["1P",/^.[^\\s\\w"-$\'./@\\\\`]*/,q]);V x(m,e)}U D(a,m){U e(a){2a(a.1u){15 1:T(k.1i(a.17))1b;T("BR"===a.2U)h(a),a.18&&a.18.3c(a);14 P(a=a.1o;a;a=a.1c)e(a);1b;15 3:15 4:T(p){6 b=a.1v,d=b.1a(t);T(d){6 c=b.W(0,d.3d);a.1v=c;(b=b.W(d.3d+d[0].Q))&&a.18.3e(s.2k(b),a.1c);h(a);c||a.18.3c(a)}}}}U h(a){U b(a,d){6 e=d?a.cloneNode(!1):a,f=a.18;T(f){6 f=b(f,1),g=a.1c;f.1m(e);P(6 h=g;h;h=g)g=h.1c,f.1m(h)}V e}P(;!a.1c;)T(a=a.18,!a)V;P(6 a=b(a.1c,0),e;(e=a.18)&&e.1u===1;)a=e;d.R(a)}6 k=/(?:^|\\s)2b(?:\\s|$)/,t=/\\r\\n?|\\n/,s=a.3f,l;a.1H?l=a.1H.2X:19.1I&&(l=s.2Y.1I(a,q).2Z("30-31"));6 p=l&&"1J"===l.W(0,3);P(l=s.1Q("LI");a.1o;)l.1m(a.1o);P(6 d=[l],g=0;g<d.Q;++g)e(d[g]);m===(m|0)&&d[0].setAttribute("value",m);6 r=s.1Q("OL");r.17="linenums";P(6 n=1j.1F(0,m-1|0)||0,g=0,z=d.Q;g<z;++g)l=d[g],l.17="L"+(g+n)%10,l.1o||l.1m(s.2k("\\3a")),r.1m(l);a.1m(r)}U k(a,m){P(6 e=m.Q;--e>=0;){6 h=m[e];A.2e(h)?19.1R&&1R.warn("cannot 3g language handler %s",h):A[h]=a}}U C(a,m){T(!a||!A.2e(a))a=/^\\s*</.1i(m)?"1y-3h":"1y-1S";V A[a]}U E(a){6 m=a.g;1x{6 e=M(a.h),h=e.a;a.a=h;a.c=e.c;a.d=0;C(m,h)(a);6 k=/\\bMSIE\\b/.1i(navigator.userAgent),m=/\\n/g,t=a.a,s=t.Q,e=0,l=a.c,p=l.Q,h=0,d=a.e,g=d.Q,a=0;d[g]=s;6 r,n;P(n=r=0;n<g;)d[n]!==d[n+2]?(d[r++]=d[n++],d[r++]=d[n++]):n+=2;g=r;P(n=r=0;n<g;){P(6 z=d[n],f=d[n+1],b=n+2;b+2<=g&&d[b+1]===f;)b+=2;d[r++]=z;d[r++]=f;n=b}P(d.Q=r;h<p;){6 o=l[h+2]||s,c=d[a+2]||s,b=1j.26(o,c),i=l[h+1],j;T(i.1u!==1&&(j=t.W(e,b))){k&&(j=j.1e(m,"\\r"));i.1v=j;6 u=i.3f,v=u.1Q("SPAN");v.17=d[a+1];6 x=i.18;x.replaceChild(v,i);v.1m(i);e<o&&(l[h+1]=i=u.2k(t.W(b,o)),x.3e(i,v.1c))}e=b;e>=o&&(h+=2);e>=c&&(a+=2)}}2l(w){"1R"in 19&&1R.log(w&&w.2m?w.2m:w)}}6 v=["1b,37,do,14,P,T,V,1T"],w=[[v,"auto,15,char,const,1y,double,enum,extern,3i,2n,3j,long,register,short,signed,sizeof,static,struct,2a,typedef,union,unsigned,1t,volatile"],"2l,1U,1M,1V,1z,2o,operator,private,protected,public,this,29,1W,1x,1K"],F=[w,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,dynamic_cast,explicit,3k,friend,inline,late_check,mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],G=[w,"abstract,boolean,byte,3l,final,1O,implements,1z,38,1s,native,2p,strictfp,2q,synchronized,throws,transient"],H=[G,"as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,2r,3o,group,implicit,in,interface,internal,into,is,lock,object,out,3g,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,2c,select,uint,ulong,unchecked,unsafe,ushort,6"],w=[w,"debugger,1X,3k,U,get,1s,2t,undefined,6,3p,3q,27"],I=[v,"2u,as,assert,1U,3r,del,2g,except,exec,1O,3o,2S,1z,in,is,lambda,nonlocal,2v,or,pass,2x,raise,1x,3p,3s,False,True,None"],J=[v,"alias,2u,begin,15,1U,3r,defined,2y,end,ensure,1V,in,module,2z,nil,2v,or,2A,rescue,retry,self,2q,2B,1W,1L,1Y,1A,3t,3s,2C,2D"],v=[v,"15,done,2g,esac,1X,fi,U,in,2E,2t,2B,1A"],K=/^(DIR|FILE|vector|(de|priority_)?queue|list|2m|(const_)?iterator|(multi)?(2t|map)|bitset|u?(3j|3i)\\d*)/,N=/\\S/,O=u({Y:[F,H,w,"3u,1M,3v,do,3w,2y,1X,3x,2r,P,2n,T,1z,3y,2E,my,2z,no,3A,2x,2p,2A,3B,3C,1L,1Y,1A,3D,3E,1T,2C,2D"+I,J,v],1d:!0,1g:!0,1p:!0,1q:!0}),A={};k(O,["1y-1S"]);k(x([],[["1f",/^[^<?]+/],["3F",/^<!\\w[^>]*(?:>|$)/],["1l",/^<\\!--[\\S\\s]*?(?:--\\>|$)/],["X-",/^<\\?([\\S\\s]+?)(?:\\?>|$)/],["X-",/^<%([\\S\\s]+?)(?:%>|$)/],["1P",/^(?:<[%?]|[%?]>)/],["X-",/^<1Z\\b[^>]*>([\\S\\s]+?)<\\/1Z\\b[^>]*>/i],["X-js",/^<3G\\b[^>]*>([\\S\\s]*?)(<\\/3G\\b[^>]*>)/i],["X-20",/^<1r\\b[^>]*>([\\S\\s]*?)(<\\/1r\\b[^>]*>)/i],["X-in.21",/^(<\\/?[a-z][^<>]*>)/i]]),["1y-3h","htm","html","mxml","xhtml","xml","xsl"]);k(x([["1f",/^\\s+/,q," \\t\\r\\n"],["2G",/^(?:"[^"]*"?|\'[^\']*\'?)/,q,"\\"\'"]],[["21",/^^<\\/?[a-z](?:[\\w-.:]*\\w)?|\\/?>$/i],["3H",/^(?!1r[\\s=]|on)[a-z](?:[\\w:-]*\\w)?/i],["X-uq.3J",/^=\\s*([^\\s"\'>]*(?:[^\\s"\'/>]|\\/(?=\\s)))/],["1P",/^[/<->]+/],["X-js",/^on\\w+\\s*=\\s*"([^"]+)"/i],["X-js",/^on\\w+\\s*=\\s*\'([^\']+)\'/i],["X-js",/^on\\w+\\s*=\\s*([^\\s"\'>]+)/i],["X-20",/^1r\\s*=\\s*"([^"]+)"/i],["X-20",/^1r\\s*=\\s*\'([^\']+)\'/i],["X-20",/^1r\\s*=\\s*([^\\s"\'>]+)/i]]),["in.21"]);k(x([],[["2G",/^[\\S\\s]+/]]),["uq.3J"]);k(u({Y:F,1d:!0,1g:!0,2h:K}),["c","cc","cpp","cxx","cyc","m"]);k(u({Y:"1s,1W,1V"}),["json"]);k(u({Y:H,1d:!0,1g:!0,35:!0,2h:K}),["cs"]);k(u({Y:G,1g:!0}),["java"]);k(u({Y:v,1d:!0,1p:!0}),["bsh","csh","sh"]);k(u({Y:I,1d:!0,1p:!0,2f:!0}),["cv","py"]);k(u({Y:"3u,1M,3v,do,3w,2y,1X,3x,2r,P,2n,T,1z,3y,2E,my,2z,no,3A,2x,2p,2A,3B,3C,1L,1Y,1A,3D,3E,1T,2C,2D",1d:!0,1p:!0,1q:!0}),["perl","pl","pm"]);k(u({Y:J,1d:!0,1p:!0,1q:!0}),["rb"]);k(u({Y:w,1g:!0,1q:!0}),["js"]);k(u({Y:"all,2u,by,2l,1U,14,3l,1V,1O,P,T,in,is,isnt,loop,2o,no,2v,1s,of,off,on,or,V,2q,2B,1W,1x,1Y,1A,3t,1T,yes",1d:3,1g:!0,multilineStrings:!0,2f:!0,1q:!0}),["coffee"]);k(x([],[["1k",/^[\\S\\s]+/]]),["36"]);19.prettyPrintOne=U(a,m,e){6 h=1w.1Q("PRE");h.3K=a;e&&D(h,e);E({g:m,i:e,h:h});V h.3K};19.prettyPrint=U(a){U m(){P(6 e=19.2I?l.22()+3L:3q;p<h.Q&&l.22()<e;p++){6 n=h[p],k=n.17;T(k.2d("3M")>=0){6 k=k.1a(g),f,b;T(b=!k){b=n;P(6 o=1t 0,c=b.1o;c;c=c.1c)6 i=c.1u,o=i===1?o?b:c:i===3?N.1i(c.1v)?b:o:o;b=(f=o===b?1t 0:o)&&"CODE"===f.23}b&&(k=f.17.1a(g));k&&(k=k[1]);b=!1;P(o=n.18;o;o=o.18)T((o.23==="1J"||o.23==="1S"||o.23==="1Z")&&o.17&&o.17.2d("3M")>=0){b=!0;1b}b||((b=(b=n.17.1a(/\\blinenums\\b(?::(\\d+))?/))?b[1]&&b[1].Q?+b[1]:!0:!1)&&D(n,b),d={g:k,h:n,i:b},E(d))}}p<h.Q?setTimeout(m,3L):a&&a()}P(6 e=[1w.2H("1J"),1w.2H("1S"),1w.2H("1Z")],h=[],k=0;k<e.Q;++k)P(6 t=0,s=e[k].Q;t<s;++t)h.R(e[k][t]);6 e=q,l=3N;l.22||(l={22:U(){V+2o 3N}});6 p=0,d,g=/\\blang(?:uage)?-([\\w.]+)(?!\\S)/;m()};19.PR={createSimpleLexer:x,registerLangHandler:k,sourceDecorator:u,PR_ATTRIB_NAME:"3H",PR_ATTRIB_VALUE:"2G",PR_COMMENT:"1l",PR_DECLARATION:"3F",PR_KEYWORD:"39",PR_LITERAL:"2j",PR_NOCODE:"2b",PR_PLAIN:"1f",PR_PUNCTUATION:"1P",PR_SOURCE:"34",PR_STRING:"1k",PR_TAG:"21",PR_TYPE:"2i"}})();', [], 236, "||||||var|||||||||||||||||||||||||||||||||||||||||||||for|length|push||if|function|return|substring|lang|keywords||||||else|case||className|parentNode|window|match|break|nextSibling|hashComments|replace|pln|cStyleComments||test|Math|str|com|appendChild|charAt|firstChild|multiLineStrings|regexLiterals|style|null|void|nodeType|nodeValue|document|try|default|import|until|||||max|join|currentStyle|getComputedStyle|pre|typeof|undef|delete||finally|pun|createElement|console|code|while|class|false|true|eval|unless|xmp|css|tag|now|tagName|charCodeAt|122|min|NaN||throw|switch|nocode|string|indexOf|hasOwnProperty|tripleQuotedStrings|elif|types|typ|lit|createTextNode|catch|stack|goto|new|package|super|foreach||set|and|not||print|elsif|next|redo|then|BEGIN|END|local||atv|getElementsByTagName|PR_SHOULD_USE_CONTINUATION|parseInt|String|fromCharCode|||apply|source|ignoreCase||global|RegExp|nodeName|||whiteSpace|defaultView|getPropertyValue|white|space|||src|verbatimStrings|regex|continue|instanceof|kwd|xa0||removeChild|index|insertBefore|ownerDocument|override|markup|float|int|export|extends|||from|with|Infinity|def|yield|when|caller|die|dump|exit|last||our|require|sub|use|wantarray|dec|script|atn||val|innerHTML|250|prettyprint|Date".split("|"), 0, {})); (function(a) {
    Date.now = Date.now ||
    function() {
        return + (new Date)
    },
    a.ias = function(A) {
        function x() {
            var c;
            J.onChangePage(function(g, d, f) {
                B && B.setPage(g, f),
                G.onPageChange.call(this, g, f, d)
            });
            if (G.triggerPageThreshold > 0) {
                Q()
            } else {
                if (a(G.next).attr("href")) {
                    var b = C.getCurrentScrollOffset(G.scrollContainer);
                    z(function() {
                        D(b)
                    })
                }
            }
            return B && B.havePage() && (I(), c = B.getPage(), C.forceScrollTop(function() {
                var d;
                c > 1 ? (q(c), d = K(!0), a("html, body").scrollTop(d)) : Q()
            })),
            F
        }
        function Q() {
            O(),
            G.scrollContainer.scroll(M)
        }
        function M() {
            var c, b;
            c = C.getCurrentScrollOffset(G.scrollContainer),
            b = K(),
            c >= b && (H() >= G.triggerPageThreshold ? (I(), z(function() {
                D(c)
            })) : D(c))
        }
        function I() {
            G.scrollContainer.unbind("scroll", M)
        }
        function O() {
            a(G.pagination).hide()
        }
        function K(c) {
            var d, b;
            return d = a(G.container).find(G.item).last(),
            d.size() === 0 ? 0 : (b = d.offset().top + d.height(), c || (b += G.thresholdMargin), b)
        }
        function D(b, d) {
            var c;
            c = a(G.next).attr("href");
            if (!c) {
                return G.noneleft && a(G.container).find(G.item).last().after(G.noneleft),
                I()
            }
            if (G.beforePageChange && a.isFunction(G.beforePageChange) && G.beforePageChange(b, c) === !1) {
                return
            }
            J.pushPages(b, c),
            I(),
            j(),
            N(c,
            function(h, g) {
                var l = G.onLoadItems.call(this, g),
                f;
                l !== !1 && (a(g).hide(), f = a(G.container).find(G.item).last(), f.after(g), a(g).fadeIn()),
                c = a(G.next, h).attr("href"),
                a(G.pagination).replaceWith(a(G.pagination, h)),
                P(),
                O(),
                c ? Q() : I(),
                G.onRenderComplete.call(this, g),
                d && d.call(this)
            })
        }
        function N(g, l, d) {
            var h = [],
            p,
            c = Date.now(),
            b,
            m;
            d = d || G.loaderDelay,
            a.get(g, null,
            function(f) {
                p = a(G.container, f).eq(0),
                0 === p.length && (p = a(f).filter(G.container).eq(0)),
                p && p.find(G.item).each(function() {
                    h.push(this)
                }),
                l && (m = this, b = Date.now() - c, b < d ? setTimeout(function() {
                    l.call(m, f, h)
                },
                d - b) : l.call(m, f, h))
            },
            "html")
        }
        function q(b) {
            var c = K(!0);
            c > 0 && D(c,
            function() {
                I(),
                J.getCurPageNum(c) + 1 < b ? (q(b), a("html,body").animate({
                    scrollTop: c
                },
                400, "swing")) : (a("html,body").animate({
                    scrollTop: c
                },
                1000, "swing"), Q())
            })
        }
        function H() {
            var b = C.getCurrentScrollOffset(G.scrollContainer);
            return J.getCurPageNum(b)
        }
        function L() {
            var b = a(".ias_loader");
            return b.size() === 0 && (b = a('<div class="ias_loader">' + G.loader + "</div>"), b.hide()),
            b
        }
        function j() {
            var b = L(),
            c;
            G.customLoaderProc !== !1 ? G.customLoaderProc(b) : (c = a(G.container).find(G.item).last(), c.after(b), b.fadeIn())
        }
        function P() {
            var b = L();
            b.remove()
        }
        function k(b) {
            var c = a(".ias_trigger");
            return c.size() === 0 && (c = a('<div class="ias_trigger"><a href="#">' + G.trigger + "</a></div>"), c.hide()),
            a("a", c).unbind("click").bind("click",
            function() {
                return e(),
                b.call(),
                !1
            }),
            c
        }
        function z(c) {
            var d = k(c),
            b;
            G.customTriggerProc !== !1 ? G.customTriggerProc(d) : (b = a(G.container).find(G.item).last(), b.after(d), d.fadeIn())
        }
        function e() {
            var b = k();
            b.remove()
        }
        var G = a.extend({},
        a.ias.defaults, A),
        C = new a.ias.util,
        J = new a.ias.paging(G.scrollContainer),
        B = G.history ? new a.ias.history: !1,
        F = this;
        x()
    },
    a.ias.defaults = {
        container: "#container",
        scrollContainer: a(window),
        item: ".item",
        pagination: "#pagination",
        next: ".next",
        noneleft: !1,
        loader: '<img src="images/loader.gif"/>',
        loaderDelay: 600,
        triggerPageThreshold: 3,
        trigger: "Load more items",
        thresholdMargin: 0,
        history: !0,
        onPageChange: function() {},
        beforePageChange: function() {},
        onLoadItems: function() {},
        onRenderComplete: function() {},
        customLoaderProc: !1,
        customTriggerProc: !1
    },
    a.ias.util = function() {
        function c() {
            a(window).load(function() {
                b = !0
            })
        }
        var b = !1,
        e = !1,
        d = this;
        c(),
        this.forceScrollTop = function(f) {
            a("html,body").scrollTop(0),
            e || (b ? (f.call(), e = !0) : setTimeout(function() {
                d.forceScrollTop(f)
            },
            1))
        },
        this.getCurrentScrollOffset = function(g) {
            var f, h;
            return g.get(0) === window ? f = g.scrollTop() : f = g.offset().top,
            h = g.height(),
            f + h
        }
    },
    a.ias.paging = function() {
        function f() {
            a(window).scroll(h)
        }
        function h() {
            var k, m, q, p, i;
            k = d.getCurrentScrollOffset(a(window)),
            m = c(k),
            q = b(k),
            g !== m && (p = q[0], i = q[1], j.call({},
            m, p, i)),
            g = m
        }
        function c(i) {
            for (var k = e.length - 1; k > 0; k--) {
                if (i > e[k][0]) {
                    return k + 1
                }
            }
            return 1
        }
        function b(i) {
            for (var k = e.length - 1; k >= 0; k--) {
                if (i > e[k][0]) {
                    return e[k]
                }
            }
            return null
        }
        var e = [[0, document.location.toString()]],
        j = function() {},
        g = 1,
        d = new a.ias.util;
        f(),
        this.getCurPageNum = function(i) {
            return i = i || d.getCurrentScrollOffset(a(window)),
            c(i)
        },
        this.onChangePage = function(i) {
            j = i
        },
        this.pushPages = function(i, k) {
            e.push([i, k])
        }
    },
    a.ias.history = function() {
        function d() {
            b = !!(window.history && history.pushState && history.replaceState),
            b = !1
        }
        var c = !1,
        b = !1;
        d(),
        this.setPage = function(g, f) {
            this.updateState({
                page: g
            },
            "", f)
        },
        this.havePage = function() {
            return this.getState() !== !1
        },
        this.getPage = function() {
            var f;
            return this.havePage() ? (f = this.getState(), f.page) : 1
        },
        this.getState = function() {
            var g, h, f;
            if (b) {
                h = history.state;
                if (h && h.ias) {
                    return h.ias
                }
            } else {
                g = window.location.hash.substring(0, 7) === "#/page/";
                if (g) {
                    return f = parseInt(window.location.hash.replace("#/page/", ""), 10),
                    {
                        page: f
                    }
                }
            }
            return ! 1
        },
        this.updateState = function(e, g, f) {
            c ? this.replaceState(e, g, f) : this.pushState(e, g, f)
        },
        this.pushState = function(h, g, e) {
            var f;
            b ? history.pushState({
                ias: h
            },
            g, e) : (f = h.page > 0 ? "#/page/" + h.page: "", window.location.hash = f),
            c = !0
        },
        this.replaceState = function(g, h, f) {
            b ? history.replaceState({
                ias: g
            },
            h, f) : this.pushState(g, h, f)
        }
    }
})(jQuery); !
function(g, f, j, i) {
    var h = g(f);
    g.fn.lazyload = function(e) {
        function d() {
            var k = 0;
            b.each(function() {
                var l = g(this);
                if (!a.skip_invisible || l.is(":visible")) {
                    if (g.abovethetop(this, a) || g.leftofbegin(this, a)) {} else {
                        if (g.belowthefold(this, a) || g.rightoffold(this, a)) {
                            if (++k > a.failure_limit) {
                                return ! 1
                            }
                        } else {
                            l.trigger("appear"),
                            k = 0
                        }
                    }
                }
            })
        }
        var c, b = this,
        a = {
            threshold: 0,
            failure_limit: 0,
            event: "scroll",
            effect: "show",
            container: f,
            data_attribute: "original",
            skip_invisible: !0,
            appear: null,
            load: null,
            placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
        };
        return e && (i !== e.failurelimit && (e.failure_limit = e.failurelimit, delete e.failurelimit), i !== e.effectspeed && (e.effect_speed = e.effectspeed, delete e.effectspeed), g.extend(a, e)),
        c = a.container === i || a.container === f ? h: g(a.container),
        0 === a.event.indexOf("scroll") && c.bind(a.event,
        function() {
            return d()
        }),
        this.each(function() {
            var k = this,
            l = g(k);
            k.loaded = !1,
            (l.attr("src") === i || l.attr("src") === !1) && l.attr("src", a.placeholder),
            l.one("appear",
            function() {
                if (!this.loaded) {
                    if (a.appear) {
                        var m = b.length;
                        a.appear.call(k, m, a)
                    }
                    g("<img />").bind("load",
                    function() {
                        var q = l.data(a.data_attribute);
                        l.hide(),
                        l.is("img") ? l.attr("src", q) : l.css("background-image", "url('" + q + "')"),
                        l[a.effect](a.effect_speed),
                        k.loaded = !0;
                        var p = g.grep(b,
                        function(r) {
                            return ! r.loaded
                        });
                        if (b = g(p), a.load) {
                            var o = b.length;
                            a.load.call(k, o, a)
                        }
                    }).attr("src", l.data(a.data_attribute))
                }
            }),
            0 !== a.event.indexOf("scroll") && l.bind(a.event,
            function() {
                k.loaded || l.trigger("appear")
            })
        }),
        h.bind("resize",
        function() {
            d()
        }),
        /iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion) && h.bind("pageshow",
        function(k) {
            k.originalEvent && k.originalEvent.persisted && b.each(function() {
                g(this).trigger("appear")
            })
        }),
        g(j).ready(function() {
            d()
        }),
        this
    },
    g.belowthefold = function(d, b) {
        var a;
        return a = b.container === i || b.container === f ? (f.innerHeight ? f.innerHeight: h.height()) + h.scrollTop() : g(b.container).offset().top + g(b.container).height(),
        a <= g(d).offset().top - b.threshold
    },
    g.rightoffold = function(d, b) {
        var a;
        return a = b.container === i || b.container === f ? h.width() + h.scrollLeft() : g(b.container).offset().left + g(b.container).width(),
        a <= g(d).offset().left - b.threshold
    },
    g.abovethetop = function(d, b) {
        var a;
        return a = b.container === i || b.container === f ? h.scrollTop() : g(b.container).offset().top,
        a >= g(d).offset().top + b.threshold + g(d).height()
    },
    g.leftofbegin = function(d, b) {
        var a;
        return a = b.container === i || b.container === f ? h.scrollLeft() : g(b.container).offset().left,
        a >= g(d).offset().left + b.threshold + g(d).width()
    },
    g.inviewport = function(a, d) {
        return ! (g.rightoffold(a, d) || g.leftofbegin(a, d) || g.belowthefold(a, d) || g.abovethetop(a, d))
    },
    g.extend(g.expr[":"], {
        "below-the-fold": function(a) {
            return g.belowthefold(a, {
                threshold: 0
            })
        },
        "above-the-top": function(a) {
            return ! g.belowthefold(a, {
                threshold: 0
            })
        },
        "right-of-screen": function(a) {
            return g.rightoffold(a, {
                threshold: 0
            })
        },
        "left-of-screen": function(a) {
            return ! g.rightoffold(a, {
                threshold: 0
            })
        },
        "in-viewport": function(a) {
            return g.inviewport(a, {
                threshold: 0
            })
        },
        "above-the-fold": function(a) {
            return ! g.belowthefold(a, {
                threshold: 0
            })
        },
        "right-of-fold": function(a) {
            return g.rightoffold(a, {
                threshold: 0
            })
        },
        "left-of-fold": function(a) {
            return ! g.rightoffold(a, {
                threshold: 0
            })
        }
    })
} (jQuery, window, document); !
function() {
    var e = jQuery.event.special,
    d = "D" + +new Date,
    f = "D" + ( + new Date + 1);
    e.scrollstart = {
        setup: function() {
            var b, a = function(c) {
                var h = this,
                g = arguments;
                b ? clearTimeout(b) : (c.type = "scrollstart", jQuery.event.dispatch.apply(h, g)),
                b = setTimeout(function() {
                    b = null
                },
                e.scrollstop.latency)
            };
            jQuery(this).bind("scroll", a).data(d, a)
        },
        teardown: function() {
            jQuery(this).unbind("scroll", jQuery(this).data(d))
        }
    },
    e.scrollstop = {
        latency: 300,
        setup: function() {
            var a, c = function(h) {
                var g = this,
                b = arguments;
                a && clearTimeout(a),
                a = setTimeout(function() {
                    a = null,
                    h.type = "scrollstop",
                    jQuery.event.dispatch.apply(g, b)
                },
                e.scrollstop.latency)
            };
            jQuery(this).bind("scroll", c).data(f, c)
        },
        teardown: function() {
            jQuery(this).unbind("scroll", jQuery(this).data(f))
        }
    }
} (); + (function(a) {
    a(document).ready(function() {
        a(".toggle-search").click(function() {
            a(".toggle-search").toggleClass("active");
            a(".search-expand").fadeToggle(250);
            setTimeout(function() {
                a(".search-expand input").focus()
            },
            300)
        });
        a(".content .avatar, .sidebar .avatar, .pagecontent .avatar").lazyload({
            placeholder: _deel.url + "/img/default.png",
            event: "scrollstop"
        });
        a(".wp-smiley").lazyload({
            placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC",
            event: "scrollstop"
        });
        if (_deel.ajaxpager) {
            a.ias({
                thresholdMargin: -100,
                triggerPageThreshold: 5,
                history: false,
                container: ".content",
                item: ".excerpt",
                pagination: ".pagination",
                next: ".next-page a",
                loader: '<div class="pagination-loading"><i class="fa fa-spinner fa-spin"></i> 数据载入中...</div>',
                trigger: "下一页",
                onPageChange: function(y, x, w) {
                    window._gaq && window._gaq.push(["_trackPageview", jQuery("<a/>").attr("href", x)[0].pathname.replace(/^[^\/]/, "/")])
                }
            })
        }
        window.prettyPrint && window.prettyPrint();
        a(".article-tags a, .post-tags a").each(function() {
            a(this).tooltip({
                container: "body",
                placement: "top",
                title: "查看关于 " + a(this).text() + " 的文章"
            })
        });
        window._bd_share_config = {
            common: {
                "bdText": "『" + a("title").text() + "』" + a(".article-content p:lt(2)").text(),
                "bdMini": "2",
                "bdMiniList": false,
                "bdPic": a(".article-content img:first") ? a(".article-content img:first").attr("src") : "",
                "bdStyle": "0",
                "bdSize": "24"
            },
            /*share: [{
                bdCustomStyle: "/wp-content/themes/wait/share.css"
            }],*/
        };
        if (a(".article-content").length) {
            a(".article-content a").tooltip({
                container: "body"
            })
        }
        if (a(".d_reader").length) {
            a(".d_reader a").tooltip({
                container: "body"
            })
        }
        if (a(".readers").length) {
            a(".readers .avatar").parent().tooltip({
                container: "body"
            })
        }
        if (a(".social").length) {
            a(".social a").tooltip({
                container: "body"
            })
        }
        if (a(".d_tags").length) {
            a(".d_tags a").tooltip({
                container: "body"
            })
        }
        a(".article-content").removeAttr("height");
        if (!h() && a(".sidebar").length) {
            var v = a(".sidebar .widget"),
            i = v.length;
            if (i && 0 < _deel.roll[0] <= i && 0 < _deel.roll[1] <= i) {
                a(window).scroll(function() {
                    var x = document.documentElement.scrollTop + document.body.scrollTop;
                    if (x > v.eq(i - 1).offset().top + v.eq(i - 1).height()) {
                        if (a(".widgetRoller").length == 0) {
                            v.parent().append('<div class="widgetRoller"></div>');
                            v.eq(_deel.roll[0] - 1).clone().appendTo(".widgetRoller");
                            if (_deel.roll[0] !== _deel.roll[1]) {
                                v.eq(_deel.roll[1] - 1).clone().appendTo(".widgetRoller")
                            }
                            var w = 10;
                            if (a("body").attr("id") == "hasfixed") {
                                w = 69
                            }
                            a(".widgetRoller").css({
                                position: "fixed",
                                top: 10,
                                zIndex: 0,
                                width: 360
                            })
                        } else {
                            a(".widgetRoller").fadeIn(300)
                        }
                    } else {
                        a(".widgetRoller").hide()
                    }
                })
            }
            a(window).scroll(function() {
                var w = a(".rollto");
                document.documentElement.scrollTop + document.body.scrollTop > 200 ? w.fadeIn() : w.fadeOut()
            })
        }
        var t = a("#nav-header").offset().top;
        a(window).scroll(function() {
            if (a(window).scrollTop() > t && a(window).width() > 719) {
                a("#nav-header").addClass("fixed")
            } else {
                a("#nav-header").removeClass("fixed")
            }
        });
        a(".navbar .nav:first").after('<div class="screen-mini"><button data-type="screen-nav" class="btn btn-inverse screen-nav"><i class="fa fa-list"></i></button></div>');
        a("body").append('<div class="rollto"><button class="btn btn-inverse" data-type="totop" title="回顶部"><i class="fa fa-arrow-up"></i></button>' + (_deel.commenton ? '<button class="btn btn-inverse" data-type="torespond" title="发评论"><i class="fa fa-comment-o"></i></button>': "") + "</div>"); (function(w) {
            w.extend({
                tipsBox: function(x) {
                    x = w.extend({
                        obj: null,
                        str: "+1",
                        startSize: "12px",
                        endSize: "30px",
                        interval: 600,
                        color: "red",
                        callback: function() {}
                    },
                    x);
                    w("body").append("<span class='num'>" + x.str + "</span>");
                    var y = w(".num");
                    var A = x.obj.offset().left + x.obj.width() / 2;
                    var z = x.obj.offset().top - x.obj.height();
                    y.css({
                        "position": "absolute",
                        "left": A + "px",
                        "top": z + "px",
                        "z-index": 9999,
                        "font-size": x.startSize,
                        "line-height": x.endSize,
                        "color": x.color
                    });
                    y.animate({
                        "font-size": x.endSize,
                        "opacity": "0",
                        "top": z - parseInt(x.endSize) + "px"
                    },
                    x.interval,
                    function() {
                        y.remove();
                        x.callback()
                    })
                }
            })
        })(jQuery);
        a.fn.postLike = function() {
            if (a(this).hasClass("actived")) {
                return alert("已经点过赞啦！")
            } else {
                a(this).addClass("actived");
                var z = a(this).data("id"),
                y = a(this).data("action"),
                x = a(this).children(".count");
                var w = {
                    action: "bigfa_like",
                    um_id: z,
                    um_action: y
                };
                a.post("/wp-admin/admin-ajax.php", w,
                function(A) {
                    a(x).html(A)
                });
                a.tipsBox({
                    obj: a(this),
                    str: "+1",
                    callback: function() {}
                });
                return false
            }
        };
        a(document).on("click", "#Addlike",
        function() {
            a(this).postLike()
        });
        a(document).on("click",
        function(D) {
            D = D || window.event;
            var C = D.target || D.srcElement,
            A = a(C);
            if (A.hasClass("disabled")) {
                return
            }
            if (A.parent().attr("data-type")) {
                A = a(A.parent()[0])
            }
            if (A.parent().parent().attr("data-type")) {
                A = a(A.parent().parent()[0])
            }
            var z = A.attr("data-type");
            switch (z) {
            case "screen-nav":
                var y = a(".navbar .nav"),
                B = a(".navbar .nav");
                y.toggleClass("active");
                B.slideToggle(300);
                break;
            case "totop":
                e();
                break;
            case "torespond":
                e("#comment-ad");
                a("#comment").focus();
                var w = document.getElementsByName("message");
                w[0].focus();
            case "comment-insert-smilie":
                if (!a("#comment-smilies").length) {
                    a("#commentform .comt-box").append('<div id="comment-smilies" class="hide"></div>');
                    var x = "";
                    for (key in g.smilies) {
                        x += '<img data-simle="' + key + '" data-type="comment-smilie" src="' + _deel.url + "/img/smilies/icon_" + g.smilies[key] + '.gif">'
                    }
                    a("#comment-smilies").html(x)
                }
                a("#comment-smilies").slideToggle(100);
                break;
            case "comment-smilie":
                u(A.attr("data-simle"));
                A.parent().slideUp(300);
                break;
            case "switch-author":
                a(".comt-comterinfo").slideToggle(300);
                a("#author").focus();
                break
            }
        });
        var g = {
            smilies: {
                "mrgreen": "mrgreen",
                "razz": "razz",
                "sad": "sad",
                "smile": "smile",
                "oops": "redface",
                "grin": "biggrin",
                "eek": "surprised",
                "???": "confused",
                "cool": "cool",
                "lol": "lol",
                "mad": "mad",
                "twisted": "twisted",
                "roll": "rolleyes",
                "wink": "wink",
                "idea": "idea",
                "arrow": "arrow",
                "neutral": "neutral",
                "cry": "cry",
                "?": "question",
                "evil": "evil",
                "shock": "eek",
                "!": "exclaim"
            }
        };
        a(".commentlist .url").attr("target", "_blank");
        a("#comment-author-info p input").focus(function() {
            a(this).parent("p").addClass("on")
        });
        a("#comment-author-info p input").blur(function() {
            a(this).parent("p").removeClass("on")
        });
        a("#comment").focus(function() {
            if (a("#author").val() == "" || a("#email").val() == "") {
                a(".comt-comterinfo").slideDown(300)
            }
        });
        var m = "0",
        f = '<div class="comt-tip comt-loading">正在提交, 请稍候...</div>',
        c = '<div class="comt-tip comt-error">#</div>',
        b = '">提交成功',
        d = "取消编辑",
        o, k = 1,
        r = [];
        r.push("");
        $comments = a("#comments-title");
        $cancel = a("#cancel-comment-reply-link");
        cancel_text = $cancel.text();
        $submit = a("#commentform #submit");
        $submit.attr("disabled", false);
        a(".comt-tips").append(f + c);
        a(".comt-loading").hide();
        a(".comt-error").hide();
        $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? a("html") : a("body")) : a("html,body");
        a("#commentform").submit(function() {
            a(".comt-loading").show();
            $submit.attr("disabled", true).fadeTo("slow", 0.5);
            if (o) {
                a("#comment").after('<input type="text" name="edit_id" id="edit_id" value="' + o + '" style="display:none;" />')
            }
            a.ajax({
                url: _deel.url + "/ajax/comment.php",
                data: a(this).serialize(),
                type: a(this).attr("method"),
                error: function(w) {
                    a(".comt-loading").hide();
                    a(".comt-error").show().html(w.responseText);
                    setTimeout(function() {
                        $submit.attr("disabled", false).fadeTo("slow", 1);
                        a(".comt-error").fadeOut()
                    },
                    3000)
                },
                success: function(B) {
                    a(".comt-loading").hide();
                    r.push(a("#comment").val());
                    a("textarea").each(function() {
                        this.value = ""
                    });
                    var y = addComment,
                    A = y.I("cancel-comment-reply-link"),
                    w = y.I("wp-temp-form-div"),
                    C = y.I(y.respondId),
                    x = y.I("comment_post_ID").value,
                    z = y.I("comment_parent").value;
                    if (!o && $comments.length) {
                        n = parseInt($comments.text().match(/\d+/));
                        $comments.text($comments.text().replace(n, n + 1))
                    }
                    new_htm = '" id="new_comm_' + k + '"></';
                    new_htm = (z == "0") ? ('\n<ol style="clear:both;" class="commentlist commentnew' + new_htm + "ol>") : ('\n<ul class="children' + new_htm + "ul>");
                    ok_htm = '\n<span id="success_' + k + b;
                    ok_htm += "</span><span></span>\n";
                    if (z == "0") {
                        if (a("#postcomments .commentlist").length) {
                            a("#postcomments .commentlist").before(new_htm)
                        } else {
                            a("#respond").after(new_htm)
                        }
                    } else {
                        a("#respond").after(new_htm)
                    }
                    a("#comment-author-info").slideUp();
                    console.log(a("#new_comm_" + k));
                    a("#new_comm_" + k).hide().append(B);
                    a("#new_comm_" + k + " li").append(ok_htm);
                    a("#new_comm_" + k).fadeIn(4000);
                    $body.animate({
                        scrollTop: a("#new_comm_" + k).offset().top - 200
                    },
                    500);
                    a(".comt-avatar .avatar").attr("src", a(".commentnew .avatar:last").attr("src"));
                    l();
                    k++;
                    o = "";
                    a("*").remove("#edit_id");
                    A.style.display = "none";
                    A.onclick = null;
                    y.I("comment_parent").value = "0";
                    if (w && C) {
                        w.parentNode.insertBefore(C, w);
                        w.parentNode.removeChild(w)
                    }
                }
            });
            return false
        });
        addComment = {
            moveForm: function(z, A, E, y, B) {
                var I = this,
                w, D = I.I(z),
                x = I.I(E),
                H = I.I("cancel-comment-reply-link"),
                F = I.I("comment_parent"),
                G = I.I("comment_post_ID");
                if (o) {
                    p()
                }
                B ? (I.I("comment").value = r[B], o = I.I("new_comm_" + B).innerHTML.match(/(comment-)(\d+)/)[2], $new_sucs = a("#success_" + B), $new_sucs.hide(), $new_comm = a("#new_comm_" + B), $new_comm.hide(), $cancel.text(d)) : $cancel.text(cancel_text);
                I.respondId = E;
                y = y || false;
                if (!I.I("wp-temp-form-div")) {
                    w = document.createElement("div");
                    w.id = "wp-temp-form-div";
                    w.style.display = "none";
                    x.parentNode.insertBefore(w, x)
                } ! D ? (temp = I.I("wp-temp-form-div"), I.I("comment_parent").value = "0", temp.parentNode.insertBefore(x, temp), temp.parentNode.removeChild(temp)) : D.parentNode.insertBefore(x, D.nextSibling);
                $body.animate({
                    scrollTop: a("#respond").offset().top - 180
                },
                400);
                if (G && y) {
                    G.value = y
                }
                F.value = A;
                H.style.display = "";
                H.onclick = function() {
                    if (o) {
                        p()
                    }
                    var K = addComment,
                    J = K.I("wp-temp-form-div"),
                    L = K.I(K.respondId);
                    K.I("comment_parent").value = "0";
                    if (J && L) {
                        J.parentNode.insertBefore(L, J);
                        J.parentNode.removeChild(J)
                    }
                    this.style.display = "none";
                    this.onclick = null;
                    return false
                };
                try {
                    I.I("comment").focus()
                } catch(C) {}
                return false
            },
            I: function(w) {
                return document.getElementById(w)
            }
        };
        function p() {
            $new_comm.show();
            $new_sucs.show();
            a("textarea").each(function() {
                this.value = ""
            });
            o = ""
        }
        var q = 15,
        j = $submit.val();
        function l() {
            if (q > 0) {
                $submit.val(q);
                q--;
                setTimeout(l, 1000)
            } else {
                $submit.val(j).attr("disabled", false).fadeTo("slow", 1);
                q = 15
            }
        }
        function e(w, x) {
            if (!x) {
                x = 1000
            }
            if (!w) {
                a("html,body").animate({
                    scrollTop: 0
                },
                x)
            } else {
                if (a(w).length > 0) {
                    a("html,body").animate({
                        scrollTop: a(w).offset().top
                    },
                    x)
                }
            }
        }
        function h() {
            if (a.browser.msie) {
                if (a.browser.version == "6.0") {
                    return true
                }
            }
            return false
        }
        function u(w) {
            w = " :" + w + ": ";
            myField = document.getElementById("comment");
            document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = w, myField.focus()) : s(w)
        }
        function s(w) {
            myField = document.getElementById("comment");
            myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + w + myField.value.substring(endPos, myField.value.length), cursorPos += w.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += w, myField.focus())
        }
    })
})(window.jQuery);
