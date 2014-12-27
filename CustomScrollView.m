//
//  CustomScrollView.m
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "CustomScrollView.h"

@implementation CustomScrollView{
}


- (id)initWithFrame:(CGRect)frame
{
    self = [super initWithFrame:frame];
    if (self) {
        self.sizeable = YES;
    }

    return self;
}


-(void) setResizeable:(BOOL)resizable{
    self.sizeable = resizable;
}

-(BOOL) isResizeable{
    NSLog(self.sizeable ? @"Yes" : @"No");
    return self.sizeable;
}
-(void) addItem:(UIView *)view{
    double newY = 0;
    UIView *someView = [self.subviews lastObject];
    newY = someView.frame.size.height+someView.frame.origin.y;
    CGRect tmpFrame = CGRectMake(view.frame.origin.x, newY, view.frame.size.width, view.frame.size.height);
    view.frame = tmpFrame;
    [self addSubview:view];
    if([self isResizeable])
        [self setContentSize:CGSizeMake(screenRect.size.width, tmpFrame.size.height+tmpFrame.origin.y)];
    
    
}
@end
