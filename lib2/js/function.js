var tien = 0;
socket['on']('chat', function (_0x90f8x2) {
    _0x90f8x2 = JSON['parse'](decode(_0x90f8x2));
    $('#phongchat')['html'](_0x90f8x2['center'] + $('#phongchat')['html']());
    
});
socket['on']('chat2', function (_0x90f8x2) {
    _0x90f8x2 = JSON['parse'](decode(_0x90f8x2));
    $('#phongchat')['html'](_0x90f8x2['center'] + $('#phongchat')['html']());
    thongbao(_0x90f8x2['notice'], 'thongtin')
});
function so_khac_tx(_0x90f8x4) {
    if (_0x90f8x4 == 1) {
        $('#khung-tx .group-button div')['html']('<div class="button" onclick="btn_money_tx($(this));"><div class="middle" data-txt="100"></div></div><div class="button" onclick="btn_money_tx($(this));"><div class="middle" data-txt="500"></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="1K"></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="5K" ></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="10K"></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="50K"></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="100K"></div> </div><div class="button"onclick="btn_money_tx($(this));" ><div class="middle" data-txt="500K"></div> </div><div class="button"onclick="btn_money_tx($(this));"><div class="middle" data-txt="1M"></div> </div><div class="button" onclick="btn_money_tx($(this));"><div class="middle" data-txt="2M" ></div> </div><div class="button" onclick="btn_money_tx($(this));"><div class="middle" data-txt="5M"></div> </div><div class="button"><div class="middle" data-txt="T\u1EA5t Tay" onclick="tattay_tx()"></div> </div><div class="button blue" onclick="so_khac_tx(2);"><div class="middle" data-txt="S\u1ED1 Kh\xE1c" ></div> </div><div class="button green"  onclick="dat_tx();" ><div class="middle" data-txt="\u0110\u1EB7t C\u01B0\u1EE3c"></div> </div><div class="button red" onclick="cuoc_tx(3)" ><div class="middle" data-txt="H\u1EE7y" ></div></div>')
    } else {
        $('#khung-tx .group-button div')['html']('<div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="1" ></div></div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="2" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="3" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="4" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="5" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="6" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="7" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="8" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="9" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="0" ></div> </div><div class="button" onclick="btn_khac_tx($(this));"><div class="middle" data-txt="000" ></div> </div><div class="button"  onclick="btn_khac_tx($(this));"><div class="middle" data-txt="X\xF3a" ></div> </div><div class="button blue" ><div class="middle" data-txt="S\u1ED1 Nhanh" onclick="so_khac_tx(1);"></div> </div><div class="button green"  onclick="dat_tx();" ><div class="middle" data-txt="\u0110\u1EB7t C\u01B0\u1EE3c"></div> </div><div class="button red" ><div class="middle" data-txt="H\u1EE7y"  onclick="cuoc_tx(3)"></div></div>')
    }
}
socket['on']('baucua', function (_0x90f8x2) {
    _0x90f8x2 = JSON['parse'](decode(_0x90f8x2));
    if (_0x90f8x2['code'] <= 0) {
        note_play('#khung_baucua .note_here', 'Vui l\xF2ng ch\u1EDD t\u1EDBi phi\xEAn sau.', 'f5f244');
        return false
    };
    $['ajax']({
        type: 'post',
        url: '/user-play',
        data: {
            play_bc: true,
            play_chon1: _0x90f8x2['data']['play_chon1'],
            play_chon2: _0x90f8x2['data']['play_chon2'],
            play_chon3: _0x90f8x2['data']['play_chon3'],
            play_chon4: _0x90f8x2['data']['play_chon4'],
            play_chon5: _0x90f8x2['data']['play_chon5'],
            play_chon6: _0x90f8x2['data']['play_chon6']
        },
        success: function (_0x90f8x5) {
            var _0x90f8x6 = JSON['parse'](_0x90f8x5);
            if (_0x90f8x6['error'] <= 0) {
                note_play('#khung_baucua .note_here', _0x90f8x6['ms'], 'f5f244')
            } else {
                socket['emit']('baucua_cuoc', encode(JSON['stringify']({
                    id: _0x90f8x6['id'],
                    cuoc1: _0x90f8x6['cuoc1'],
                    cuoc2: _0x90f8x6['cuoc2'],
                    cuoc3: _0x90f8x6['cuoc3'],
                    cuoc6: _0x90f8x6['cuoc6'],
                    cuoc4: _0x90f8x6['cuoc4'],
                    cuoc5: _0x90f8x6['cuoc5']
                })));
                note_play('#khung_baucua .note_here', _0x90f8x6['ms'], _0x90f8x6['color']);
                check_all(2)
            }
        }
    })
});
socket['on']('check', function (_0x90f8x2) {
    var _0x90f8x7 = JSON['parse'](decode(_0x90f8x2));
    if (_0x90f8x7['code'] <= 0) {
        note_play('#khung-tx .move-here .note_here', 'Vui long \u0111\u1EE3i \u0111\u1EBFn phi\xEAn sau.', 'f5f244')
    } else {
        $['ajax']({
            type: 'post',
            url: '/user-play',
            data: {
                play_tx: true,
                play_chon: _0x90f8x7['type'],
                key: _0x90f8x7['key'],
                play_dat: _0x90f8x7['xu'],
                phien   : _0x90f8x7['phien'],
            },
            success: function (_0x90f8x5) {
                var _0x90f8x6 = JSON['parse'](_0x90f8x5);
                if (_0x90f8x6['error'] <= 0) {
                    note_play('#khung-tx .move-here .note_here', _0x90f8x6['ms'], 'f5f244')
                } else {
                    note_play('.move-here .note_here', _0x90f8x6['ms'], _0x90f8x6['color']);
                    check_all(1);
                    socket['emit']('cuoc', encode(JSON['stringify']({
                        type: _0x90f8x6['type'],
                        id: _0x90f8x6['id'],
                        key: _0x90f8x6['key'],
                        md5: _0x90f8x6['az'],
                        xu: _0x90f8x6['xu']
                    })))
                }
            }
        })
    }
});
socket['on']('time', function (_0x90f8x2) {
    set_time(JSON['parse'](decode(_0x90f8x2)))
});
socket['on']('taixiu', function (_0x90f8x2) {
    var _0x90f8x7 = JSON['parse'](decode(_0x90f8x2));
    $('#vung-taixiu')['hide']();
    kq_taixiu(_0x90f8x7, false);
    set_roll_tx(1, _0x90f8x7);
    $('#game_id_1_mini div,#ducnghia_timetaixiu')['removeClass']('showwin');
    if ($('#game-taixiu')['css']('display') == 'block') {
        return false
    };
    if (_0x90f8x7['color'] == 'xiu-wrap') {
        $('#game_id_1_mini div,#ducnghia_timetaixiu')['html']('<img src=\"/lib/img/tx/xiu_on.png\" style=\"width: 100%;height: auto;\">')
    } else {
        $('#game_id_1_mini div,#ducnghia_timetaixiu')['html']('<img src=\"/lib/img/tx/tai_on.png\" style=\"width: 100%;height: auto;\">')
    }
});

function decode(_0x90f8x9) {
    var _0x90f8x5 = '';
    _0x90f8x9 = _0x90f8x9['replace'](/ /g, '');
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x9['length']; _0x90f8xa += 2) {
        _0x90f8x5 += String['fromCharCode'](parseInt(_0x90f8x9['substr'](_0x90f8xa, 2), 16))
    };
    return decodeURIComponent(escape(_0x90f8x5))
}

function encode(_0x90f8x5) {
    _0x90f8x5 = unescape(encodeURIComponent(_0x90f8x5));
    var _0x90f8x9 = '';
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x5['length']; _0x90f8xa++) {
        _0x90f8x9 += ' ' + _0x90f8x5['charCodeAt'](_0x90f8xa).toString(16)
    };
    return _0x90f8x9
}

function dragx(_0x90f8x4, _0x90f8xd) {
    $(function () {
        var _0x90f8xe = 0;
        _0x90f8x4['draggable']({
            axis: 'x',
            start: function () {},
            drag: function () {
                _0x90f8xe++;
                if (_0x90f8xe > 7) {
                    $('.menu_game_drag')['show']();
                    _0x90f8xe = -999999
                }
            },
            stop: function () {
                $('.menu_game_drag')['hide']();
                _0x90f8xe = 0;
                var _0x90f8xf = $(this)['position']();
                if (_0x90f8xf['left'] > 0) {
                    $(this)['animate']({
                        left: '0px'
                    }, 500)
                };
                var _0x90f8x10 = $(_0x90f8xd)['length'],
                    _0x90f8x11 = 0,
                    _0x90f8xa = 0;
                for (_0x90f8xa = 0; _0x90f8xa < _0x90f8x10; _0x90f8xa++) {
                    _0x90f8x11 += $(_0x90f8xd)['eq'](_0x90f8xa)['width']()
                };
                var _0x90f8x9 = '-' + (_0x90f8x11 - _0x90f8x4['width']() + 10);
                if (_0x90f8x11 < _0x90f8x4['width']() && _0x90f8xf['left'] < 0) {
                    _0x90f8x4['animate']({
                        left: '0px'
                    }, 200)
                };
                var _0x90f8x12 = _0x90f8x11 - $(this)['width']();
                if ((_0x90f8x12 + _0x90f8xf['left']) < 0 && _0x90f8xf['left'] < 0) {
                    $(this)['animate']({
                        left: _0x90f8x9 + 'px'
                    }, 500)
                }
            }
        })
    })
}

function dragy(_0x90f8x4, _0x90f8xd) {
    $(function () {
        function _0x90f8x14(_0x90f8x15) {
            return false;
            var _0x90f8xf = _0x90f8x4['position']();
            if (_0x90f8xf['top'] > -10 && _0x90f8x15 != 1) {
                if (_0x90f8x15 > 0) {
                    return false
                };
                _0x90f8x4['animate']({
                    top: '0px'
                }, 300)
            };
            var _0x90f8x10 = $(_0x90f8xd)['length'],
                _0x90f8x11 = 0,
                _0x90f8xa = 0;
            for (_0x90f8xa = 0; _0x90f8xa < _0x90f8x10; _0x90f8xa++) {
                _0x90f8x11 += $(_0x90f8xd)['eq'](_0x90f8xa)['height']()
            };
            var _0x90f8x9 = '-' + (_0x90f8x11 - _0x90f8x4['height']() + 10);
            if (_0x90f8x11 < _0x90f8x4['height']() && _0x90f8x15 != 2) {
                if (_0x90f8x15 > 0) {
                    return false
                };
                _0x90f8x4['animate']({
                    top: '0px'
                }, 200)
            };
            if (((_0x90f8x11 - _0x90f8x4['height']()) + _0x90f8xf['top']) < 10 && _0x90f8xf['top'] < 0 && _0x90f8x15 != 2) {
                if (_0x90f8x15 > 0) {
                    return false
                };
                _0x90f8x4['animate']({
                    top: _0x90f8x9 + 'px'
                }, 300)
            };
            return true
        }
        _0x90f8x4['on']('mousewheel', function (_0x90f8x16) {
            if (_0x90f8x16['originalEvent']['wheelDelta'] / 120 > 0) {
                if (_0x90f8x14(2) == true) {
                    _0x90f8x4['css']({
                        top: _0x90f8x4['position']()['top'] + (_0x90f8x4['height']() * 0.1) + 'px'
                    })
                }
            } else {
                if (_0x90f8x14(1) == true) {
                    _0x90f8x4['css']({
                        top: _0x90f8x4['position']()['top'] - (_0x90f8x4['height']() * 0.1) + 'px'
                    })
                }
            };
            _0x90f8x16['preventDefault']()
        });
        _0x90f8x4['draggable']({
            axis: 'y',
            stop: function () {
                _0x90f8x14()
            }
        });
        _0x90f8x14('1')
    })
}

function dragz(_0x90f8x18, _0x90f8xd, _0x90f8x19) {
    $(function () {
        function _0x90f8x14(_0x90f8x18, _0x90f8xd, _0x90f8x19, _0x90f8x15) {
            var _0x90f8x1a = Number(_0x90f8x1e['css']('left')['replace']('px', ''));
            if (_0x90f8x15 == 1) {
                var _0x90f8x1b = Math['floor'](_0x90f8x1a + _0x90f8x1e['width']()) + 10
            } else {
                var _0x90f8x1b = Math['floor'](_0x90f8x1a - _0x90f8x1e['width']()) + 10
            };
            var _0x90f8x1c = Math['floor'](_0x90f8x1b / _0x90f8x1e['width']());
            var _0x90f8x1d = Math['floor'](_0x90f8x1b - _0x90f8x1e['width']());
            _0x90f8x1e['css']({
                left: _0x90f8x1c + '' + '00%'
            });
            var _0x90f8x10 = $(_0x90f8x19)['length'],
                _0x90f8x11 = 0,
                _0x90f8xa = 0;
            for (_0x90f8xa = 0; _0x90f8xa < _0x90f8x10; _0x90f8xa++) {
                _0x90f8x11 += $(_0x90f8x19)['eq'](_0x90f8xa)['width']()
            };
            if (_0x90f8x1c > -1) {
                $(_0x90f8x18 + ' .left')['hide']()
            } else {
                $(_0x90f8x18 + ' .left')['show']()
            };
            if ('-' + _0x90f8x11 > _0x90f8x1d) {
                $(_0x90f8x18 + ' .right')['hide']()
            } else {
                $(_0x90f8x18 + ' .right')['show']()
            };
            console['log'](_0x90f8x1b);
            console['log'](_0x90f8x1c);
            console['log'](_0x90f8x1b / _0x90f8x1e['width']());
            return true
        }
        var _0x90f8x4 = $(_0x90f8x18);
        var _0x90f8x1e = $(_0x90f8xd);
        $(_0x90f8x18 + ' .left')['on']('click touchstart mousedown touchend', function () {
            if (check_click($(this)) == true) {
                _0x90f8x14(_0x90f8x18, _0x90f8xd, _0x90f8x19, 1)
            }
        })['hide']();
        $(_0x90f8x18 + ' .right')['on']('click touchstart mousedown touchend', function () {
            if (check_click($(this)) == true) {
                _0x90f8x14(_0x90f8x18, _0x90f8xd, _0x90f8x19, 2)
            }
        })
    })
}

function njs(_0x90f8x4) {
    var _0x90f8x20 = String(_0x90f8x4);
    var _0x90f8x21 = _0x90f8x20['length'];
    var _0x90f8x22 = 0;
    var _0x90f8x23 = '';
    var _0x90f8xa;
    for (_0x90f8xa = _0x90f8x21 - 1; _0x90f8xa >= 0; _0x90f8xa--) {
        _0x90f8x22 += 1;
        aa = _0x90f8x20[_0x90f8xa];
        if (_0x90f8x22 % 3 == 0 && _0x90f8x22 != 0 && _0x90f8x22 != _0x90f8x21) {
            _0x90f8x23 = '.' + aa + _0x90f8x23
        } else {
            _0x90f8x23 = aa + _0x90f8x23
        }
    };
    return _0x90f8x23
}

function note_play(_0x90f8x25, _0x90f8x26, _0x90f8x11) {
    var _0x90f8x4 = Math['floor']((Math['random']() * 99999999) + 1);
    $('' + _0x90f8x25)['html']('<p class=\"note_play id' + _0x90f8x4 + '\">' + _0x90f8x26 + '</p>');
    $('.note_play.id' + _0x90f8x4)['css']({
        'color': '#' + _0x90f8x11
    })['slideDown']('slow');
    setTimeout(function () {
        $('.note_play.id' + _0x90f8x4)['animate']({
            opacity: '0.0',
            height: 'toggle'
        }, 500)['promise']()['done'](function () {
            $(this)['remove']()
        })
    }, 1500);
    return false
}

function check_all(_0x90f8x25) {
    $['ajax']({
        type: 'post',
        url: '/user-play',
        data: {
            user_check: true,
            check_game: _0x90f8x25
        },
        success: function (_0x90f8x5) {
            var _0x90f8x6 = JSON['parse'](_0x90f8x5);
            $('.mymoney')['html'](njs(_0x90f8x6['money']));
            $('.ketmoney')['html'](njs(_0x90f8x6['ketmoney']));
            $('.locmoney')['html'](njs(_0x90f8x6['loc']));
            $('.vipmoney')['html'](njs(_0x90f8x6['vip']));
            if (_0x90f8x6['smssend'] > 0) {
                $('#hom_thu_send')['html'](_0x90f8x6['smssend'])['show']()
            } else {
                $('#hom_thu_send')['hide']()
            };
            if (_0x90f8x25 == 1 || _0x90f8x25 == 10) {
                
            } else {
                if (_0x90f8x25 == 2) {
                    $('#khung_baucua .cuadat .item:nth-child(1) div .c-cuoc')['html'](_0x90f8x6['var1']);
                    $('#khung_baucua .cuadat .item:nth-child(2) div .c-cuoc')['html'](_0x90f8x6['var2']);
                    $('#khung_baucua .cuadat .item:nth-child(3) div .c-cuoc')['html'](_0x90f8x6['var3']);
                    $('#khung_baucua .cuadat .item:nth-child(4) div .c-cuoc')['html'](_0x90f8x6['var4']);
                    $('#khung_baucua .cuadat .item:nth-child(5) div .c-cuoc')['html'](_0x90f8x6['var5']);
                    $('#khung_baucua .cuadat .item:nth-child(6) div .c-cuoc')['html'](_0x90f8x6['var6'])
                } else {
                    if (_0x90f8x25 == 3) {
                        $('#khung_baucua .cuadat .item:nth-child(1) div .a-cuoc')['html'](_0x90f8x6['var1'])['show']();
                        $('#khung_baucua .cuadat .item:nth-child(2) div .a-cuoc')['html'](_0x90f8x6['var2'])['show']();
                        $('#khung_baucua .cuadat .item:nth-child(3) div .a-cuoc')['html'](_0x90f8x6['var3'])['show']();
                        $('#khung_baucua .cuadat .item:nth-child(4) div .a-cuoc')['html'](_0x90f8x6['var4'])['show']();
                        $('#khung_baucua .cuadat .item:nth-child(5) div .a-cuoc')['html'](_0x90f8x6['var5'])['show']();
                        $('#khung_baucua .cuadat .item:nth-child(6) div .a-cuoc')['html'](_0x90f8x6['var6'])['show']()
                    } else {
                        if (_0x90f8x25 == 8 || _0x90f8x25 == 11) {
                            $('#khung_id8 .money-red-play div')['html'](njs(_0x90f8x6['bns1']));
                            $('#khung_id8 .money-blu-play div')['html'](njs(_0x90f8x6['bns2']))
                        } else {
                            if (_0x90f8x25 == 'xocdia1') {
                                $('#khung_id10 .cuoc_khung1 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][0]);
                                $('#khung_id10 .cuoc_khung2 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][1]);
                                $('#khung_id10 .cuoc_khung3 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][2]);
                                $('#khung_id10 .cuoc_khung4 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][3]);
                                $('#khung_id10 .cuoc_khung5 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][4]);
                                $('#khung_id10 .cuoc_khung6 .all_b')['attr']('data-txt', _0x90f8x6['xocdia'][5])
                            } else {
                                if (_0x90f8x25 == 'xocdia2') {
                                    $('#khung_id10 .cuoc_khung1 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][0]);
                                    $('#khung_id10 .cuoc_khung2 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][1]);
                                    $('#khung_id10 .cuoc_khung3 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][2]);
                                    $('#khung_id10 .cuoc_khung4 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][3]);
                                    $('#khung_id10 .cuoc_khung5 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][4]);
                                    $('#khung_id10 .cuoc_khung6 .all_m')['attr']('data-txt', _0x90f8x6['xocdia'][5])
                                }
                            }
                        }
                    }
                }
            };
            if (_0x90f8x6['hoan'] > 0 && _0x90f8x25 == 10) {
                note_play('#khung-tx .move-here .note_here', 'B\u1EA1n V\u1EEBa B\u1ECB Ho\xE0n ' + njs(_0x90f8x6['hoan']), 'f5f244')
            };
            if (_0x90f8x6['hoan2'] > 0 && _0x90f8x25 == 11) {
                note_play('#khung_id8 .move-here .note_here', 'B\u1EA1n V\u1EEBa B\u1ECB Ho\xE0n ' + njs(_0x90f8x6['hoan2']), 'f5f244')
            }
        }
    });
    return false
}

function check_win(_0x90f8x25, _0x90f8x26) {
    if (_0x90f8x25 == 'tai-xiu') {
        if (_0x90f8x26 == 'tai-wrap') {
            var _0x90f8x11 = njs(Math['floor']($('.khung-tx .cuoc-tai')['html']()['replace'](/\./g, '')) * 1.95)
        } else {
            if (_0x90f8x26 == 'xiu-wrap') {
                var _0x90f8x11 = njs(Math['floor']($('.khung-tx .cuoc-xiu')['html']()['replace'](/\./g, '')) * 1.95)
            }
        };
        check_all(1);
        if (_0x90f8x11 != '0') {
            setTimeout(function () {
                note_play('#khung-tx .move-here .note_here', 'Bạn thắng, vào lịch sử để xem.', '04b904');
                $('.khung-tx .cuoc-xiu')['html']('0');
                $('.khung-tx .cuoc-tai')['html']('0')
            }, 2500)
        }
    };
    if (_0x90f8x25 == 'blade-soul') {
        if (_0x90f8x26 == 'red') {
            var _0x90f8x11 = njs(Math['floor']($('#khung_id8 .money-red-play div')['html']()['replace'](/\./g, '')) * 1.95)
        } else {
            if (_0x90f8x26 == 'blu') {
                var _0x90f8x11 = njs(Math['floor']($('#khung_id8 .money-blu-play div')['html']()['replace'](/\./g, '')) * 1.95)
            }
        };
        if (_0x90f8x11 != '0') {
            setTimeout(function () {
                note_play('#khung_id8 .move-here .note_here', 'Bạn thắng, vào lịch sử để xem.', '04b904')
            }, 2500)
        };
        check_all(8)
    };
    return false
}

function Load_Game(_0x90f8x4, _0x90f8x2a) {
    if (khunggame[0] == 1 && khunggame[_0x90f8x2a] == 1) {
        $('#' + _0x90f8x2a)['show']('fade', {}, 500)
    } else {
        if (khunggame[0] == 1) {
            if (checkCookie(_0x90f8x2a) == false) {
                var _0x90f8x2b = 30
            } else {
                var _0x90f8x2b = 5
            };
            $('.progress_' + _0x90f8x2a)['append']('<div class=\"progress_main\" style=\"    top: 45%;z-index: 9999;\"><div class=\"progress_load\"></div><div class=\"progress_time\" style=\"font-size: 25px;\"></div></div>');
            (function _0x90f8x2c(_0x90f8xa) {
                setTimeout(function () {
                    $('.progress_' + _0x90f8x2a + ' .progress_load')['css']({
                        width: _0x90f8xa + '%'
                    });
                    $('.progress_' + _0x90f8x2a + ' .progress_time')['html']('Load ' + _0x90f8xa + '%');
                    if (++_0x90f8xa < 100) {
                        _0x90f8x2c(_0x90f8xa)
                    } else {
                        $('#' + _0x90f8x2a)['show']();
                        _0x90f8x2b = 0;
                        $('.progress_' + _0x90f8x2a + ' .progress_main')['hide']()
                    }
                }, _0x90f8x2b)
            })(0);
            khunggame[_0x90f8x2a] = 1;
            $['ajax']({
                type: 'post',
                url: '/user',
                data: {
                    load_game: true,
                    game_load: _0x90f8x4
                },
                success: function (_0x90f8x5) {
                    $('.main-game')['append'](_0x90f8x5);
                    $('#' + _0x90f8x2a)['hide']();
                    if (checkCookie(_0x90f8x2a) == true) {
                        $('#' + _0x90f8x2a)['show']()
                    };
                    setCookie(_0x90f8x2a, '1', 0.1)
                }
            })
        }
    }
}

function hideHis() {
    $('.main-his')['removeClass']('show-main');
    $('.main-his .show-main')['removeClass']('show-main')
}

function set_img(_0x90f8x4, _0x90f8x2a, _0x90f8x11) {
    _0x90f8x4 = (100 / Math['floor'](_0x90f8x2a)) * Math['floor'](_0x90f8x4);
    if (_0x90f8x11) {
        _0x90f8x4 = _0x90f8x4 + _0x90f8x11
    };
    return _0x90f8x4
}

function set_time(_0x90f8x5) {
    $('.khung-tx .cuoc-xiu')['html'](njs(_0x90f8x5['cx']));
    $('.khung-tx .cuoc-tai')['html'](njs(_0x90f8x5['ct']))
    if (tien <= 0) {
        numanimate_2($('.khung-tx .money-tai,.game-item-2 .money-tai .middle'), _0x90f8x5['t'], 17);
        numanimate_2($('.khung-tx .money-xiu,.game-item-2 .money-xiu .middle'), _0x90f8x5['x'], 17);
        $('.khung-tx .user-tai')['html'](njs(_0x90f8x5['at']));
        $('.khung-tx .user-xiu')['html'](njs(_0x90f8x5['ax']));
        $('.khung-tx .roll-play span')['html'](_0x90f8x5['r'])
    } else {
        if (tien == 1) {
            numanimate_2($('.khung-tx .money-tai,.game-item-2 .money-tai .middle'), _0x90f8x5['t2'], 17);
            numanimate_2($('.khung-tx .money-xiu,.game-item-2 .money-xiu .middle'), _0x90f8x5['x2'], 17);
            $('.khung-tx .user-tai')['html'](njs(_0x90f8x5['at2']));
            $('.khung-tx .user-xiu')['html'](njs(_0x90f8x5['ax2']));
            $('.khung-tx .roll-play span')['html'](_0x90f8x5['r'] + ' thử')
        }
    };
    $('#khung_id8 .money-red-user div')['html'](njs(_0x90f8x5['bs1']));
    $('#khung_id8 .money-blu-user div')['html'](njs(_0x90f8x5['bs2']));
    $('#khung_id8 .money-red div font')['html'](njs(_0x90f8x5['abs1']));
    $('#khung_id8 .money-blu div font')['html'](njs(_0x90f8x5['abs2']));
    $('#khung_baucua .phien span')['html'](_0x90f8x5['r']);
    $('#khung_baucua .cuadat .item:nth-child(1) div .b-cuoc')['html'](_0x90f8x5['bc1']);
    $('#khung_baucua .cuadat .item:nth-child(2) div .b-cuoc')['html'](_0x90f8x5['bc2']);
    $('#khung_baucua .cuadat .item:nth-child(3) div .b-cuoc')['html'](_0x90f8x5['bc3']);
    $('#khung_baucua .cuadat .item:nth-child(4) div .b-cuoc')['html'](_0x90f8x5['bc4']);
    $('#khung_baucua .cuadat .item:nth-child(5) div .b-cuoc')['html'](_0x90f8x5['bc5']);
    $('#khung_baucua .cuadat .item:nth-child(6) div .b-cuoc')['html'](_0x90f8x5['bc6']);
    if (gid[10] == '#khung_id10 ') {
        chip_roll_id10('cuoc_khung1', _0x90f8x5['xocdia'][0]);
        chip_roll_id10('cuoc_khung2', _0x90f8x5['xocdia'][1]);
        chip_roll_id10('cuoc_khung3', _0x90f8x5['xocdia'][2]);
        chip_roll_id10('cuoc_khung4', _0x90f8x5['xocdia'][3]);
        chip_roll_id10('cuoc_khung5', _0x90f8x5['xocdia'][4]);
        chip_roll_id10('cuoc_khung6', _0x90f8x5['xocdia'][5])
    };
    capnhathured = 23 - Math['floor'](_0x90f8x5['a']);
    if (Math['floor'](_0x90f8x5['b']) > 0) {
        if (Math['floor'](_0x90f8x5['b']) > 38) {
            $('#khung_id10 .cuoc_khbox .all_s')['removeClass']('active');
            $('#khung_id10 .animation')['css']({
                'top': '0px',
                'left': '0px'
            })['addClass']('id10_laccaidia');
            $('#khung_id10 .all_chip')['remove']()
        } else {
            $('#khung_id10 .animation')['removeClass']('id10_laccaidia')['css']({
                'top': '0px',
                'left': '0px'
            })
        };
        if ($('#game-taixiu2')['hasClass']('time') == false) {
            $('#game-taixiu2')['addClass']('time')
        };
        $('#game_id_8_mini div,#game_id_2_mini div,#game_id_1_mini div, #ducnghia_timetaixiu')['html'](_0x90f8x5['b']);
        $('#khung_baucua .dia')['removeClass']('ef');
        $('#khung_baucua .active')['removeClass']('active');
        $('.clock-big')['html'](_0x90f8x5['b'])['html'](_0x90f8x5['b'])['show']();
        $('#khung_id10 .chechen')['show']();
        $('.clock img,#khung_id10 .clock-small')['hide']();
        timeclock = 0
    } else {
        if (_0x90f8x5['a'] > 16) {
            $('#game-taixiu2 .clock img')['css']({
                'opacity': 1
            })
        } else {};
        $('.clock img,#khung_id10 .clock-small')['show']();
        $('#game-taixiu2')['removeClass']('time');
        $('.clock-big')['hide']();
        $('.clock-small')['html'](_0x90f8x5['a']);
        $('#game_id_8_mini div.showwin')['html']('<font color=\"red\">' + _0x90f8x5['a'] + '</font>');
        $('#game_id_1_mini div.showwin,#ducnghia_timetaixiu')['html']('<font color=\"red\">' + _0x90f8x5['a'] + '</font>');
        $('#game_id_2_mini div')['html']('<font color=\"red\">' + _0x90f8x5['a'] + '</font>');
        if (_0x90f8x5['a'] > 5) {
            $('#game-taixiu .vung_number span')['html'](Math['floor'](_0x90f8x5['a']) - 5);
            if ($('#khung_id10 .nangame')['val']() == 1) {
                $('#khung_id10 .clock-small')['html'](Math['floor'](_0x90f8x5['a']) - 5)
            }
        } else {
            if (ketquatxvung != false) {
                kq_taixiu(ketquatxvung, true)
            };
            if (kq_xocdia && kq_xocdia != null) {
                kq_roll_id10(kq_xocdia)
            }
        };
        timeclock = Math['floor'](_0x90f8x5['a']) * 1000
    }
}

function tron_k(_0x90f8x5) {
    _0x90f8x5 = Math['floor'](_0x90f8x5);
    return njs(Math['floor'](_0x90f8x5 / 1000))
}

function setCookie(_0x90f8x32, _0x90f8x33, _0x90f8x34) {
    var _0x90f8x35 = new Date();
    if (_0x90f8x34) {
        _0x90f8x35['setTime'](_0x90f8x35['getTime']() + (_0x90f8x34 * 24 * 60 * 60 * 1000));
        document['cookie'] = _0x90f8x32 + '=' + _0x90f8x33 + ';expires=' + _0x90f8x35['toUTCString']()
    } else {
        document['cookie'] = _0x90f8x32 + '=' + _0x90f8x33 + ';expires=Fri, 30 Dec 9999 23:59:59 GMT;'
    }
}

function check_click2(_0x90f8x4) {
    if (_0x90f8x4['data']('click') != 'click') {
        _0x90f8x4['data']('click', 'click');
        setTimeout(function () {
            _0x90f8x4['removeData']('click')
        }, 100);
        return true
    };
    return false
}

function check_click(_0x90f8x4) {
    if (_0x90f8x4['data']('click') != 'click') {
        _0x90f8x4['data']('click', 'click');
        setTimeout(function () {
            _0x90f8x4['removeData']('click')
        }, 300);
        return true
    };
    return false
}
$(document)['ready'](function () {});

function numanimate(_0x90f8x4, _0x90f8x2a) {
    var _0x90f8x39 = Math['floor'](_0x90f8x4['val']());
    var _0x90f8x3a = (Math['floor'](_0x90f8x2a) - Math['floor'](_0x90f8x4['val']())) / 10;
    (function _0x90f8x2c(_0x90f8xa) {
        setTimeout(function () {
            _0x90f8x4['html'](njs(Math['floor'](_0x90f8x39 + (11 - _0x90f8xa) * _0x90f8x3a)));
            if (--_0x90f8xa) {
                _0x90f8x2c(_0x90f8xa)
            } else {
                _0x90f8x4['val'](_0x90f8x2a)
            }
        }, 30)
    })(10)
}

function numanimate_2(_0x90f8x4, _0x90f8x2a, _0x90f8x19) {
    var _0x90f8x3c = Math['floor'](_0x90f8x19);
    var _0x90f8x39 = Math['floor'](_0x90f8x4['val']());
    var _0x90f8x3a = (Math['floor'](_0x90f8x2a) - Math['floor'](_0x90f8x4['val']())) / _0x90f8x3c;
    (function _0x90f8x2c(_0x90f8xa) {
        setTimeout(function () {
            _0x90f8x4['html'](njs(Math['floor'](_0x90f8x39 + (_0x90f8x3c + 1 - _0x90f8xa) * _0x90f8x3a)));
            if (--_0x90f8xa) {
                _0x90f8x2c(_0x90f8xa)
            } else {
                _0x90f8x4['val'](_0x90f8x2a)
            }
        }, 40)
    })(_0x90f8x3c)
}

function getCookie(_0x90f8x3e) {
    var _0x90f8x3f = _0x90f8x3e + '=';
    var _0x90f8x40 = document['cookie']['split'](';');
    for (var _0x90f8xa = 0; _0x90f8xa < _0x90f8x40['length']; _0x90f8xa++) {
        var _0x90f8x11 = _0x90f8x40[_0x90f8xa];
        while (_0x90f8x11['charAt'](0) == ' ') {
            _0x90f8x11 = _0x90f8x11['substring'](1)
        };
        if (_0x90f8x11['indexOf'](_0x90f8x3f) == 0) {
            return _0x90f8x11['substring'](_0x90f8x3f['length'], _0x90f8x11['length'])
        }
    };
    return ''
}

function checkCookie(_0x90f8x3e) {
    var _0x90f8x42 = getCookie(_0x90f8x3e);
    if (_0x90f8x42 != '') {
        return true
    } else {
        return false
    }
}
$(document)['ready'](function () {
    check_all(0);
    dragz('#wesite_game_lr', '.menu-game .swiper-wrapper', '.menu-game .swiper-wrapper');
    dragy($('#lsscroll'), '#lsscroll .showhe');
    dragy($('#show_hu_number'), '#show_hu_number .body_1');
    khunggame[0] = 1;
    Load_Game(1, 'game-taixiu');
    Load_Game(2, 'khung_baucua')
});
$(document)['on']('click', 'a', function (_0x90f8x43) {
    _0x90f8x43['preventDefault']();
    var _0x90f8x44 = $(this)['attr']('href');
    var _0x90f8x14 = _0x90f8x44['split']('//');
    if (!_0x90f8x14[1]) {
        if (_0x90f8x44 != '#menu' && _0x90f8x44 != '#ducnghia' && _0x90f8x44 != '#' && _0x90f8x44 != '#home') {
            getContent(_0x90f8x44)
        }
    } else {
        getContent(_0x90f8x44)
    }
});
window['addEventListener']('popstate', function (_0x90f8x16) {
    getContent(location['pathname'], false)
});

function getContent(_0x90f8x46, _0x90f8x47) {
    loadingView = false;
    if (!_0x90f8x47) {};
    var _0x90f8x48 = new XMLHttpRequest();
    _0x90f8x48['onreadystatechange'] = function () {
        if (this['readyState'] == 4 && this['status'] == 200) {
            $('#ducnghia')['html'](this['responseText'])
        }
    };
    _0x90f8x48['open']('POST', _0x90f8x46, true);
    _0x90f8x48['setRequestHeader']('Content-type', 'application/x-www-form-urlencoded');
    _0x90f8x48['send']('t=1&load=1');
    history['pushState']('object or string representing the state of the page', 'Xin Chao', _0x90f8x46)
}

function dangky() {
    $['ajax']({
        url: '/type/send.php?reg',
        type: 'POST',
        data: $('#form_login')['find']('select, textarea, input')['serialize'](),
        success: function (_0x90f8x4a) {
            var _0x90f8x4 = $['parseJSON'](_0x90f8x4a);
            thongbao(_0x90f8x4['msg'], _0x90f8x4['type'])
        }
    })
}

function exit() {
    $['ajax']({
        url: '/type/send.php?exit',
        type: 'POST',
        data: $('#form_login')['find']('select, textarea, input')['serialize'](),
        success: function (_0x90f8x4a) {
            $('#menu_login')['html']('<a class="dropdown-item" href="/dangnhap"><i class="mdi mdi-cached mr-2 text-success"></i> \u0110\u0103ng nh\u1EADp</a><div class="dropdown-divider"></div><a class="dropdown-item" href="/dangky"><i class="mdi mdi-logout mr-2 text-primary"></i> \u0110\u0103ng k\xFD </a>');
            $('#name')['html']('Kh\xE1ch');
            $('#name2')['html']('Ch\xE0o b\u1EA1n.');
            $('#xu')['html']('');
            $('#menu_1')['show']();
            $('#menu_2')['show']();
            getContent('/dangnhap')
        }
    })
}

function chat() {
    $['ajax']({
        url: '/type/send.php?chat',
        type: 'POST',
        data: {
            chat: $('#name_chat')['val']()
        },
        success: function (_0x90f8x4) {
            if (_0x90f8x4['type'] == 'thanhcong') {
                $('#phongchat')['html'](_0x90f8x4['center'] + $('#phongchat')['html']());
                $('#name_chat')['val']('');
                socket['emit']('chat', encode(JSON['stringify']({
                    center: _0x90f8x4['center'],
                    notice: _0x90f8x4['notice']
                })))
            } else {
                thongbao(_0x90f8x4['msg'], _0x90f8x4['type'])
            }
        }
    })
}

function doitien() {
    thongbao('Tinh nang choi thu dong tu ngay 9/1', 'thanhcong');
    return false;
    $['ajax']({
        url: '/type/send.php?tien',
        type: 'POST',
        success: function (_0x90f8x4a) {
            thongbao(_0x90f8x4a, 'thanhcong');
            if (tien >= 1) {
                tien = 0
            } else {
                tien = 1
            };
            check_all(1)
        }
    })
}

function dangnhap() {
    $['ajax']({
        url: '/type/send.php?login',
        type: 'POST',
        data: $('#form_login')['find']('select, textarea, input')['serialize'](),
        success: function (_0x90f8x4a) {
            var _0x90f8x4 = $['parseJSON'](_0x90f8x4a);
            thongbao(_0x90f8x4['msg'], _0x90f8x4['type']);
            if (_0x90f8x4['type'] == 'thanhcong') {
                $('#menu_login')['html']('<div class="dropdown-divider"></div><a class="dropdown-item" href="#" onclick="exit()"><i class="mdi mdi-logout mr-2 text-primary"></i> Tho\xE1t </a>');
                $('#name')['html'](_0x90f8x4['name']);
                $('#name2')['html'](_0x90f8x4['name']);
                $('#xu')['html'](_0x90f8x4['xu']);
                $('#menu_2')['hide']();
                $('#menu_1')['hide']();
                getContent('/index.php')
            }
        }
    })
}
setInterval(function () {
    check_all(1);
}, 5000)