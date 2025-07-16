(function ($) {
  $(document).ready(function () {
    var customJS = $("#custom-js").val();
    var customCss = $("#custom-css").val();

    var formattedJs = null;
    var formattedCss = null;

    try {
      formattedJs = js_beautify(customJS, {
        indent_size: 2,
        space_in_empty_paren: true,
        end_with_new_line: true,
        preserve_newlines: true,
        max_preserve_newlines: 2,
      });
    } catch (e) {
      formattedJs = customJS;

      console.error("Beautify formatting JS:", e);
    }

    try {
      formattedCss = css_beautify(customCss, {
        indent_size: 2,
        space_in_empty_paren: true,
        end_with_new_line: true,
        preserve_newlines: true,
        max_preserve_newlines: 2,
      });
    } catch (e) {
      formattedCss = customCss;
      console.error("Beautify formatting CSS:", e);
    }

    var editorCss = CodeMirror.fromTextArea(
      document.getElementById("custom-css"),
      {
        value: "var foo = 'bar';",
        gutters: ["CodeMirror-lint-markers"],
        lint: { options: { esversion: 2021 } },
        lineNumbers: true,

        styleActiveLine: true,
        matchBrackets: true,
        theme: "one-dark",
        tabSize: 2,
        indentUnit: 2,
        indentWithTabs: true,
        lineWrapping: true,
        extraKeys: { "Ctrl-Space": "autocomplete" },
        mode: "css",
      }
    );

    editorCss.getDoc().setValue(formattedCss);

    var editorJs = CodeMirror.fromTextArea(
      document.getElementById("custom-js"),
      {
        value: "var foo = 'bar';",
        gutters: ["CodeMirror-lint-markers"],
        lint: { options: { esversion: 2021 } },
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        theme: "one-dark",
        tabSize: 2,
        indentUnit: 2,
        indentWithTabs: true,
        lineWrapping: true,
        extraKeys: { "Ctrl-Space": "autocomplete" },
        mode: { name: "javascript", globalVars: true },
      }
    );

    editorJs.getDoc().setValue(formattedJs);
  });
})(jQuery);
