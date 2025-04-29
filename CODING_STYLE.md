# Coding Style Guide

This file serves as a reference for the coding style used throughout the project. All developers should adhere to the following conventions to maintain consistency.

## General Guidelines
- Use 4 spaces for indentation.
- Place opening braces on the same line as the declaration (e.g., `try {`).
- Add a blank line before `return` statements for readability.
- Catch exceptions using `\Exception` and provide meaningful error messages in JSON responses.

## Example Code

### Try-Catch Block
```php
try
{
    // Code logic here
    return response()->json($data, 200);

} catch (\Exception $e) {
    return response()->json([
        'error' => 'Error message here'
    ], 500);
}
```

### Function Structure
```php
public function functionName(Request $request)
{
    $data = $request->only(['key1', 'key2']);

    try
    {
        // Code logic here
        return response()->json([
            'message' => 'Success message here'
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error message here'
        ], 500);
    }
}
```