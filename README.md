# My Contacts Export Module

This repository contains the **my.contactsexport** module, which provides functionality to export contacts from Bitrix24. The module is designed with modularity and ease of use in mind.

## Components

- **Module:** `my.contactsexport`  
  Implements the core functionality for exporting contacts.

- **Component:** `contacts.export`  
  Provides a user interface to interact with the export functionality. This component allows users to select export options and trigger the export process.

- **User Page:** `/export_contacts`  
  A dedicated page where users can access the export feature via the `contacts.export` component.

## Usage

1. Navigate to the `/export_contacts` page.
2. Use the interface provided by the `contacts.export` component to configure and initiate the export.
3. The module will process your request and provide an exported file according to your selected format.
