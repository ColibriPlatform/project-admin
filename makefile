VERSION=1.0.0
RELEASE_ARCHIVE=colibri-admin-$(VERSION).zip
DIST_FOLDER=dist

all : $(DIST_FOLDER)/$(RELEASE_ARCHIVE)

.PHONY: clean

$(DIST_FOLDER)/$(RELEASE_ARCHIVE) : $(DIST_FOLDER)
	cd $(DIST_FOLDER) && zip -r $(RELEASE_ARCHIVE) . -x \.\*

$(DIST_FOLDER) :
	mkdir $(DIST_FOLDER)
	composer update --no-dev --prefer-dist
	rsync -rcv \
	--filter "- composer.json" \
	--filter "- composer.lock" \
	--filter "- README*" \
	--filter "- CHANGELOG*" \
	--filter "- CHANGE*" \
	--filter "- UPGRADE*" \
	--filter "- phpunit.xml*" \
	--filter "- codeception.yml*" \
	--filter "+ /web/.htaccess" \
	--filter "- .*" \
	--filter "- /dist" \
	--filter "- **/bin" \
	--filter "- **/doc" \
	--filter "+ /vendor/bower-asset/adminlte/LICENSE" \
	--filter "+ /vendor/bower-asset/adminlte/dist" \
	--filter "+ /vendor/bower-asset/adminlte/dist/img/boxed-bg.jpg" \
	--filter "- /vendor/bower-asset/adminlte/dist/img/*" \
	--filter "- /vendor/bower-asset/adminlte/dist/css/alt" \
	--filter "- /vendor/bower-asset/adminlte/dist/css/skins/skin*" \
	--filter "- /vendor/bower-asset/adminlte/dist/js/pages" \
	--filter "- /vendor/bower-asset/adminlte/dist/js/demo.js" \
	--filter "- /vendor/bower-asset/adminlte/*" \
	--filter "+ /vendor/bower-asset/bootstrap/LICENSE" \
	--filter "+ /vendor/bower-asset/bootstrap/dist" \
	--filter "- /vendor/bower-asset/bootstrap/dist/css/*.map" \
	--filter "- /vendor/bower-asset/bootstrap/dist/js/npm.js" \
	--filter "- /vendor/bower-asset/bootstrap/*" \
	--filter "+ /vendor/bower-asset/bootstrap3-dialog/dist" \
	--filter "- /vendor/bower-asset/bootstrap3-dialog/dist/less" \
	--filter "- /vendor/bower-asset/bootstrap3-dialog/*" \
	--filter "+ /vendor/bower-asset/fontawesome/css" \
	--filter "+ /vendor/bower-asset/fontawesome/fonts" \
	--filter "- /vendor/bower-asset/fontawesome/css/*.map" \
	--filter "- /vendor/bower-asset/fontawesome/*" \
	--filter "+ /vendor/bower-asset/inputmask/LICENSE.txt" \
	--filter "+ /vendor/bower-asset/inputmask/dist" \
	--filter "+ /vendor/bower-asset/inputmask/dist/jquery.inputmask.bundle.js" \
	--filter "- /vendor/bower-asset/inputmask/dist/*" \
	--filter "- /vendor/bower-asset/inputmask/*" \
	--filter "+ /vendor/bower-asset/jquery/LICENSE.txt" \
	--filter "+ /vendor/bower-asset/jquery/dist" \
	--filter "+ /vendor/bower-asset/jquery/dist/jquery.js" \
	--filter "+ /vendor/bower-asset/jquery/dist/jquery.min.js" \
	--filter "- /vendor/bower-asset/jquery/dist/*" \
	--filter "- /vendor/bower-asset/jquery/*" \
	--filter "+ /vendor/bower-asset/jquery-ui/themes" \
	--filter "+ /vendor/bower-asset/jquery-ui/themes/smoothness" \
	--filter "+ /vendor/bower-asset/jquery-ui/jquery-ui.js" \
	--filter "- /vendor/bower-asset/jquery-ui/themes/*" \
	--filter "- /vendor/bower-asset/jquery-ui/*" \
	--filter "+ /vendor/bower-asset/js-cookie/src" \
	--filter "+ /vendor/bower-asset/js-cookie/src/js.cookie.js" \
	--filter "+ /vendor/bower-asset/js-cookie/MIT-LICENSE.txt" \
	--filter "- /vendor/bower-asset/js-cookie/src/*" \
	--filter "- /vendor/bower-asset/js-cookie/*" \
	--filter "+ /vendor/bower-asset/punycode/punycode.js" \
	--filter "+ /vendor/bower-asset/punycode/LICENSE-MIT.txt" \
	--filter "- /vendor/bower-asset/punycode/*" \
	--filter "+ /vendor/bower-asset/yii2-pjax/jquery.pjax.js" \
	--filter "+ /vendor/bower-asset/yii2-pjax/LICENSE" \
	--filter "- /vendor/bower-asset/yii2-pjax/*" \
	--filter "+ /vendor/ezyang/htmlpurifier/library**" \
	--filter "+ /vendor/ezyang/htmlpurifier/LICENSE" \
	--filter "- /vendor/ezyang/htmlpurifier/*" \
	--filter "- /vendor/**/tests" \
	--filter "- /runtime/**" \
	--filter "- /web/assets/**" \
	--filter "- /makefile" \
	--filter "- /yii" \
	. $(DIST_FOLDER)

clean :
	rm -rf $(DIST_FOLDER)

