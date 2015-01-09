//
//  FileManager.h
//  Stage
//
//  Created by Joubin Jabbari on 12/29/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <Foundation/Foundation.h>
#import <Parse/Parse.h>
@interface FileManager : NSObject
+(void)createDirectory:(NSString *)directoryName atFilePath:(NSString *)filePath;
+ (NSArray *)scanPath:(NSString *) sPath;
+ (void)downloadingLecture:(NSString *)folder withFileName:(NSString *)fileName withLectureUrl:(NSString *)someUrl;
@end
