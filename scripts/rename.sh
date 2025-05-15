#!/bin/bash

# Function to replace text in files
replace_text() {
  local search=$1
  local replace=$2
  local file=$3
  sed -i "s/${search//\//\\/}/${replace//\//\\/}/g" "$file"
}

# Ask for a plugin name, is should only contain letters
read -p "Enter the plugin name (e.g. Template): " plugin_name

# generate a slug version of the plugin name
plugin_slug=$(echo "$plugin_name" | tr '[:upper:]' '[:lower:]' | tr ' ' '-')

# make the first character of each word in the plugin name uppercase
plugin_name_capitalized=$(echo "$plugin_name" | awk '{for(i=1;i<=NF;i++) $i=toupper(substr($i,1,1)) tolower(substr($i,2));}1')
# remove spaces from the plugin name capitalized
plugin_name_pascal=$(echo "$plugin_name_capitalized" | tr -d ' ')

echo
echo "Plugin name: $plugin_name"
echo "Plugin slug: $plugin_slug"
echo "Namespace: EqualizeDigital\\$plugin_name_pascal"
echo

# Ask for a prefix chacter pattern
read -p "Enter the prefix character pattern (e.g. edac): " prefix
prefix_upper=$(echo $prefix | awk '{print toupper($0)}')

echo
echo "Prefix: $prefix"
echo "Constants prefix: $prefix_upper"
echo

# Ask does this all look correct
read -p "Does this all look correct? (y/n): " -n 1 -r
echo
# if not correct, exit
if [[ ! $REPLY =~ ^[Yy]$ ]]
then
  echo "Exiting..."
  exit 1
fi

echo
# now everything is correct, we can start renaming the content and the files
# starting with composer.json

# update the "name": "equalizedigital/template" to "name": "equalizedigital/$plugin_slug"
echo "Updating composer.json..."
#echo "using equalizedigital/$plugin_slug for name"
replace_text "\"equalizedigital/template\"" "\"equalizedigital/$plugin_slug\"" "composer.json"
#echo "using $plugin_name_pascal for namespace suffix"
replace_text "\\\\Template\\\\" "\\\\$plugin_name_pascal\\\\" "composer.json"

# Now update the package.json
echo "Updating package.json..."
#echo "using @equalize-digital/$plugin_slug for name"
# replace @equalize-digital/template, with @equalize-digital/$plugin_slug,
replace_text "\"@equalize-digital/template\"" "\"@equalize-digital/$plugin_slug\"" "package.json"

# now we will update /includes/Template.php
# if the file is not found, echo and skip
if [ ! -f "includes/Template.php" ]; then
  echo "File not found: includes/Template.php"
  echo "Skipping..."
else
  echo "Updating /includes/Template.php..."
  #echo "using $plugin_name_pascal for class name, file name and namespace
  # suffix"
  replace_text "Template" "$plugin_name_pascal" "includes/Template.php"
  # rename the file to the new class name
  mv includes/Template.php includes/$plugin_name_pascal.php
fi

# now for the most fun part, renaming main file
# if the file is not found, echo and skip
if [ ! -f "template.php" ]; then
  echo "File not found: template.php"
  echo "Skipping..."
else
  echo "Updating template.php..."
  #echo "using $plugin_name_pascal for namespace suffix, $prefix_upper for
  # constants prefix and $plugin_name_pascal for main plugin class name and $plugin_slug for file name"
  # update the Name: Template to Name: $plugin_name
  replace_text "Name: Template" "Name: $plugin_name" "template.php"
  # replace Text Domain: template to Text Domain: $slug
  replace_text "template-slug" "$plugin_slug" "template.php"
  # replace EDT with $prefix_upper
  replace_text "EDT" "$prefix_upper" "template.php"
  # replace Template with $plugin_name_pascal
  replace_text "Template" "$plugin_name_pascal" "template.php"

  # rename the file to the new class name
  mv template.php $plugin_slug.php
fi

# update template-slug in phpcs.xml
echo "Updating phpcs.xml..."
replace_text "template-slug" "$plugin_slug" "phpcs.xml"

echo
echo "Renaming complete!"
echo "Don't forget to update the folder name to $plugin_slug run \`composer install\` and remove this script."
