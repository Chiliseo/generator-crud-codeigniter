"use strict";
const Generator = require("yeoman-generator");
const chalk = require("chalk");
const yosay = require("yosay");

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.
    this.log(
      yosay(
        `Welcome to the delightful ${chalk.red(
          "generator-crud-codeigniter"
        )} generator!`
      )
    );

    const prompts = [
      {
        type: "input",
        name: "someAnswer",
        message: "Name module"
      },
      {
        type: "input",
        name: "tableName",
        message: "Name Table"
      }
    ];

    return this.prompt(prompts).then(props => {
      // To access props later use this.props.someAnswer;
      this.props = props;
    });
  }

  writing() {
    const capitalize = s => {
      if (typeof s !== "string") return "";
      return s.charAt(0).toUpperCase() + s.slice(1);
    };
    var moduleName = capitalize(this.props.someAnswer);
    var moduleNameVar = this.props.someAnswer.toLowerCase();
    var tablename = this.props.tableName.toLowerCase();
    console.log(this.props);
    this.fs.copyTpl(
      this.templatePath("_controller.php"),
      this.destinationPath("controllers/" + moduleName + ".php"),
      { moduleName: moduleName, moduleNameVar: moduleNameVar }
    );
    this.fs.copyTpl(
      this.templatePath("_model.php"),
      this.destinationPath("models/" + moduleName + "_model.php"),
      { moduleName: moduleName, tablename: tablename }
    );
  }

  install() {
    this.installDependencies();
  }
};
